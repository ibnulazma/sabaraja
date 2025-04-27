<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Items extends BaseController
{
    public function delete_selected()
    {
        $model = new ItemModel();
        $selectedItems = $this->request->getPost('items');

        foreach ($selectedItems as $itemId) {
            $model->delete($itemId);
        }

        return 'success';
    }
}
