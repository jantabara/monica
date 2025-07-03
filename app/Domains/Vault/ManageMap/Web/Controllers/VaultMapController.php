<?php

namespace App\Domains\Vault\ManageMap\Web\Controllers;

use App\Domains\Vault\ManageMap\Web\ViewHelpers\VaultMapIndexViewHelper;
use App\Domains\Vault\ManageVault\Web\ViewHelpers\VaultIndexViewHelper;
use App\Http\Controllers\Controller;
use App\Models\Vault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class VaultMapController extends Controller
{
    public function index(Request $request, Vault $vault)
    {
        $vault = Vault::findOrFail($vault->id);

        return Inertia::render('Vault/Map/Index', [
            'layoutData' => VaultIndexViewHelper::layoutData($vault),
            'data' => VaultMapIndexViewHelper::data(
                vault: $vault,
                user: Auth::user(),
            ),
        ]);
    }
}
