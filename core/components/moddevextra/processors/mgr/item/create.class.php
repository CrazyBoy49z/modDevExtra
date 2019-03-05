<?php

class modDevExtraItemCreateProcessor extends modObjectCreateProcessor
{
    public $objectType = 'modDevExtraItem';
    public $classKey = 'modDevExtraItem';
    public $languageTopics = ['moddevextra'];
    //public $permission = 'create';


    /**
     * @return bool
     */
    public function beforeSet()
    {
        $name = trim($this->getProperty('name'));
        if (empty($name)) {
            $this->modx->error->addField('name', $this->modx->lexicon('moddevextra_item_err_name'));
        } elseif ($this->modx->getCount($this->classKey, ['name' => $name])) {
            $this->modx->error->addField('name', $this->modx->lexicon('moddevextra_item_err_ae'));
        }

        return parent::beforeSet();
    }

}

return 'modDevExtraItemCreateProcessor';