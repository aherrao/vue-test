<?php
namespace App\Observers;

use App\Models\BaseModel;

class BaseModelObserve
{

    /**
     * Listen to the saving event.(called both for creating and updating)
     *
     * @param
     *            $objModel
     *
     * @return void
     */
    public function saving(BaseModel $objModel)
    {
        /** get defined fields for model and interchange key and value so that compare 2 array using key */
        $arrStrDefinedFields = array_flip($objModel->getDefinedFields());

        /** get combined which are available in request and defined field */
        $arrMixDefinedExtraFields = array_intersect_key(request()->all(), $arrStrDefinedFields);

        /** get previously stored data */
        $arrMixExtraData = $objModel->extra_data;

        /** Set extra data as extra request fields */
        if (is_array($arrMixExtraData)) {
            $objModel->extra_data = array_merge($arrMixExtraData, $arrMixDefinedExtraFields);
        } else {
            $objModel->extra_data = $arrMixDefinedExtraFields;
        }

        /** Set client id to each table*/
        $objModel->client_id = auth()->user()->client_id;

        /** Set create by or updated by for each table */
        if($objModel->id) {
            $objModel->updated_by = auth()->user()->id;
        } else {
            $objModel->created_by = auth()->user()->id;
            $objModel->updated_by = auth()->user()->id;
        }
    }
}
