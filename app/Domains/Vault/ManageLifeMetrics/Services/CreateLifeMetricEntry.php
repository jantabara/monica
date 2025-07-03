<?php

namespace App\Domains\Vault\ManageLifeMetrics\Services;

use App\Interfaces\ServiceInterface;
use App\Models\LifeMetricEntry;
use App\Services\BaseService;

class CreateLifeMetricEntry extends BaseService implements ServiceInterface
{
    /**
     * Get the validation rules that apply to the service.
     */
    public function rules(): array
    {
        return [
            'contact_id' => 'required|uuid|exists:contacts,id',
            'author_id' => 'required|uuid|exists:users,id',
            'value' => 'required|int|max:255',
        ];
    }

    /**
     * Get the permissions that apply to the user calling the service.
     */
    public function permissions(): array
    {
        return [
            'author_must_belong_to_account',
            'author_must_be_vault_editor',
            'vault_must_belong_to_account',
        ];
    }

    /**
     * Create a life metric.
     */
    public function execute(array $data): LifeMetricEntry
    {
        $this->validateRules($data);

        return LifeMetricEntry::create([
            'contact_id' => $data['account_id'],
            'value' => $data['value'],
        ]);
    }
}
