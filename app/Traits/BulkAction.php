<?php


namespace App\Traits;


trait BulkAction
{

    public $model = false;

    public $actions = [
        'enable' => [
            'name' => 'general.enable',
            'message' => 'bulk_actions.message.enable',
            'permission' => 'update-common-items',
        ],
        'disable' => [
            'name' => 'general.disable',
            'message' => 'bulk_actions.message.disable',
            'permission' => 'update-common-items',
        ],
        'delete' => [
            'name' => 'general.delete',
            'message' => 'bulk_actions.message.delete',
            'permission' => 'delete-common-items',
        ],
        'export' => [
            'name' => 'general.export',
            'message' => 'bulk_actions.message.export',
            'type' => 'download'
        ],
    ];

    public function getSelectedRecords($request)
    {
        return $this->model::find($this->getSelectedInput($request));
    }

    public function getSelectedInput($request)
    {
        return $request->get('selected', []);
    }

    public function duplicate($request)
    {
        $items = $this->getSelectedRecords($request);

        foreach ($items as $item) {
            $item->duplicate();
        }
    }


    public function enable($request)
    {
        $items = $this->getSelectedRecords($request);

        foreach ($items as $item) {
            $item->enabled = 1;
            $item->save();
        }
    }

    public function disable($request)
    {
        $items = $this->getSelectedRecords($request);

        foreach ($items as $item) {
            $item->enabled = 0;
            $item->save();
        }
    }

    public function delete($request)
    {
        $this->destroy($request);
    }

    public function destroy($request)
    {
        $items = $this->getSelectedRecords($request);

        foreach ($items as $item) {
            $item->delete();
        }
    }

    public function disableContacts($request)
    {
        $contacts = $this->getSelectedRecords($request);

        foreach ($contacts as $contact) {
            try {
                $this->dispatch(new UpdateContact($contact, request()->merge(['enabled' => 0])));
            } catch (\Exception $e) {
                flash($e->getMessage())->error();
            }
        }
    }

    public function deleteContacts($request)
    {
        $contacts = $this->getSelectedRecords($request);

        foreach ($contacts as $contact) {
            try {
                $this->dispatch(new DeleteContact($contact));
            } catch (\Exception $e) {
                flash($e->getMessage())->error();
            }
        }
    }

    public function deleteTransactions($request)
    {
        $transactions = $this->getSelectedRecords($request);

        foreach ($transactions as $transaction) {
            try {
                $this->dispatch(new DeleteTransaction($transaction));
            } catch (\Exception $e) {
                flash($e->getMessage())->error();
            }
        }
    }
}
