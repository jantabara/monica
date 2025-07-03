<?php

namespace App\Domains\Vault\ManageMap\Web\ViewHelpers;

use App\Models\User;
use App\Models\Vault;

class VaultMapIndexViewHelper
{
    public static function data(Vault $vault, User $user): array
    {
        $contacts = $vault->contacts()
            ->where('listed', true)
            ->whereHas('addresses', function ($query) {
                $query->where('address_type_id', 1);
                $query->whereNotNull('latitude');
                $query->whereNotNull('longitude');
            })
            ->with(['addresses' => function ($query) {
                $query->where('address_type_id', 1);
                $query->whereNotNull('latitude');
                $query->whereNotNull('longitude');
            }])
            ->get();

        $contactCollection = collect();

        foreach ($contacts as $contact) {
            $contactCollection->push([
                'id' => $contact->id,
                'name' => $contact->name,
                'addresses' => $contact->addresses,
                'avatar' => $contact->avatar,
                'url' => [
                    'show' => route('contact.show', [
                        'vault' => $vault->id,
                        'contact' => $contact->id,
                    ]),
                ],
            ]);
        }

        return [
            'contacts' => $contactCollection,
        ];
    }
}
