<div>
    <div class="
        grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6
    ">
        <x-nova-mailcoach::form-field label="Vorname" name="first_name" required />

        <x-nova-mailcoach::form-field label="Nachname" name="last_name" required />

        <x-nova-mailcoach::form-field label="E-Mail-Adresse" name="email" type="email" required />

        <x-nova-mailcoach::form-field
            label="Anrede"
            name="gender"
            type="select"
            :options="$genders"
        />

        <x-nova-mailcoach::form-field label="Ort" name="city" />
    </div>

    <div class="flex">
        <input type="checkbox" wire:model="privacyAccepted" class="mr-2 mt-1">
        <span class="leading-snug text-sm">
            Hiermit willige ich ein, dass meine Daten zum Versand des personalisierten Newsletters gespeichert werden. Ich kann meine Einwilligung jederzeit widerrufen und den Newsletter abbestellen.
        </span>
    </div>

    <div class="
        min-h-6 text-xs text-red-500
    ">
        @if($errors->has('privacyAccepted'))
            {{ $errors->first('privacyAccepted') }}
        @endif
    </div>

    <div class="
        mt-8
        flex justify-center
    ">
        <button
            class="
                bg-green-500 hover:bg-green-700
                text-white font-display uppercase
                px-8 py-1
                rounded
            "
            wire:click="submit()"
        >
            Anmelden
        </button>
    </div>
</div>
