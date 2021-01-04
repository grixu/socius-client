<?php

namespace Grixu\SociusClient\Operator\Actions;

use Grixu\SociusClient\Customer\Actions\ConvertToCustomerDataAction;
use Illuminate\Support\Carbon;

class ParseOperatorAction
{
    public function execute(array $item): array
    {
        $role = null;
        if (!empty($item['role'])) {
            $actionHelper = new ParseOperatorRoleAction();
            $role = $actionHelper->execute($item['role']);
        }

        $customers = null;
        if (!empty($item['customers'])) {
            $actionHelper = new ConvertToCustomerDataAction();
            $customers = $actionHelper->execute($item['customers']);
        }

        $branches = null;
        if (!empty($item['branches'])) {
            $actionHelper = new ConvertToBranchDataAction();
            $branches = $actionHelper->execute($item['branches']);
        }

        return [
            'id' => (int) $item['id'],
            'name' => (string) $item['name'],
            'xlUsername' => (string) $item['xl_username'],
            'email' => (string) $item['email'],
            'xlId' => (int) $item['xl_id'],
            'roleId' => (int) $item['operator_role_id'],
            'syncTs' => Carbon::make($item['sync_ts']),
            'updatedAt' => Carbon::make($item['updated_at']),
            'role' => $role,
            'customers' => $customers,
            'branches' => $branches,
        ];
    }
}
