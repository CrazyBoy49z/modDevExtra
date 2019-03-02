<div class="card mini-card">
    {if $new?}
        <div class="product-status">
            <span>{'ms2_frontend_new' | lexicon}</span>
        </div>
    {/if}
    <div class="card-body">
    <div class="row">
        
    <a href="{$id|url}" class="col-6">
        {if $thumb?}
            <img class="card-img-top" src="{$thumb}" alt="{$pagetitle}" title="{$pagetitle}"/>
        {else}
            <img class="card-img-top" src="{'assets_url' | option}images/no_image.svg"
                 srcset="{'assets_url' | option}images/no_image.svg"
                 alt="{$pagetitle}" title="{$pagetitle}" />
        {/if}
    </a>
    <div class="col-6">
        <a href="{$id|url}" class="card-title">{$pagetitle}</a>
        {if $description}
            <p class="card-text">{$description}</p>
        {/if}
 
        
    </div>
    
</div><div class="card-footer">
        <div class="row">
            <div class="col-6">
                <span class="price">
                    {$price} {'ms2_frontend_currency' | lexicon}
                </span>
                {if $old_price?}
                    <span class="old_price">{$old_price} {'ms2_frontend_currency' | lexicon}</span>
                {/if}
            </div>
            <div class="col-6">
                <form method="post" class="ms2_form">
                    <button class="btn btn-default btn-buy" type="submit" name="ms2_action" value="cart/add">Купить</button>
                    <input type="hidden" name="id" value="{$id}">
                    <input type="hidden" name="count" value="1">
                    <input type="hidden" name="options" value="[]">
                </form>
            </div>
        </div>
    </div>
</div>
</div>