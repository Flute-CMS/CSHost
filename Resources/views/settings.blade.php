@php
    $settings = $gateway ? $gateway->getSettings() : [];

    if (empty($settings)) {
        $settings = [
            'idcassa'  => '',
            'secretKey'=> '',
        ];
    }
@endphp

<x-forms.field>
    <x-forms.label for="settings__idcassa" required>ID кассы:</x-forms.label>
    <x-fields.input name="settings__idcassa" id="settings__idcassa"
        value="{{ request()->input('settings__idcassa', $settings['idcassa']) }}"
        placeholder="Вставьте сюда ID кассы" required />
</x-forms.field>

<x-forms.field>
    <x-forms.label for="settings__secretKey" required>Секретный ключ:</x-forms.label>
    <x-fields.input name="settings__secretKey" id="settings__secretKey" type="password"
        value="{{ request()->input('settings__secretKey', $settings['secretKey']) }}"
        placeholder="Вставьте сюда секретный ключ" required />
</x-forms.field> 