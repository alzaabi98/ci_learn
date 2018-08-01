

<div class="row mb-2">


    <div class="col-md-6">
        
        <ul class="list-group">
            <?php foreach($tags as $tag) : ?>
                <li class="list-group-item">
                    <a href="<?= base_url() . 'tags/posts/' . $tag['id'] ?>">
                        <?= $tag['name'] ?>
                    </a>
                    
                </li>
            <?php endforeach ; ?>
        </ul>
        
        
    </div>


</div>


