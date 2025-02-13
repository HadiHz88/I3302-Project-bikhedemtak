<x-layout>
    <x-partials.heading>Edit Your Info</x-partials.heading>
    <x-forms.form method="POST" action="/login">
        @method('PATCH')
        <x-forms.input label="Name" name="name" type="text"/>
        <x-forms.input label="Password" name="password" type="password"/>
        <x-forms.input label="Confirm Password" name="password_confirmation" type="password"/>
        <x-forms.divider/>
        <x-forms.input label="Profile Picture" name="profile_pic" type="file"/>

        <x-forms.button>Update</x-forms.button>
    </x-forms.form>
</x-layout>
