<?php

class modDevExtraItemRemoveProcessor extends modObjectProcessor
{
    public $objectType = 'modDevExtraItem';
    public $classKey = 'modDevExtraItem';
    public $languageTopics = ['moddevextra'];
    //public $permission = 'remove';


    /**
     * @return array|string
     */
    public function process()
    {
        if (!$this->checkPermissions()) {
            return $this->failure($this->modx->lexicon('access_denied'));
        }

        $ids = $this->modx->fromJSON($this->getProperty('ids'));
        if (empty($ids)) {
            return $this->failure($this->modx->lexicon('moddevextra_item_err_ns'));
        }

        foreach ($ids as $id) {
            /** @var modDevExtraItem $object */
            if (!$object = $this->modx->getObject($this->classKey, $id)) {
                return $this->failure($this->modx->lexicon('moddevextra_item_err_nf'));
            }

            $object->remove();
        }

        return $this->success();
    }

}

return 'modDevExtraItemRemoveProcessor';