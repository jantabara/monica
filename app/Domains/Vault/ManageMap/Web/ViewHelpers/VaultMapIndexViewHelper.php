<?php

namespace App\Domains\Vault\ManageMap\Web\ViewHelpers;

use App\Models\User;
use App\Models\Vault;

class VaultMapIndexViewHelper
{
    public static function data(Vault $vault, User $user): array
    {
        $contacts = $vault->contacts()->where('listed', true)->get();

        $contactCollection = collect();

        foreach ($contacts as $contact) {
            $contactCollection->push([
                'id' => $contact->id,
                'name' => $contact->name,
                // 'avatar' => $contact->avatar,
                // 'url' => [
                //   'show' => route('contact.show', [
                //     'vault' => $vault->id,
                //     'contact' => $contact->id,
                //   ]),
                // ],
            ]);
        }

        return [
            'contacts' => $contactCollection,
        ];
    }
}
