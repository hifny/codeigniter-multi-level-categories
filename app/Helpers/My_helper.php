<?php 

if ( ! function_exists('parenttext'))
{
    function parenttext($category_id,$parenttext='')
    {
        $parent = new App\Models\CategoriesModel;
        $parent = $parent->asObject()->find($category_id);
        if(!$parent->parent){
            $parenttext = ($parenttext)?'<span class="badge badge-secondary">'.$parenttext.'</span> < <span class="badge badge-secondary">'.$parent->name.'</span>':'<span class="badge badge-secondary">'.$parent->name.'</span>';
        } else{
            $text = ($parenttext)?'<span class="badge badge-secondary">'.$parenttext.'</span> < <span class="badge badge-secondary">'.$parent->name:$parent->name.'</span>';
            $parenttext = parenttext($parent->parent,$text);
        }
        return $parenttext;
    }
}
if ( ! function_exists('children'))
{
    function children($category_id)
    {
        $children = new App\Models\CategoriesModel;
        return $children->asObject()->where('parent',$category_id)->findAll();
    }
}
if ( ! function_exists('children_row')){

    function children_row($parent_id)
    {
        if(children($parent_id)): 
            foreach(children($parent_id) as $child): ?>
            <tr>
                <th scope="row"><?=$child->id?></th>
                <td><?=$child->name?></td>
                <td><?=parenttext($child->parent) ?></td>
                <td><?=$child->created_at?></td>
                <td><?=$child->updated_at?></td>
            </tr>
            <?=children_row($child->id)?>
            <?php endforeach; 
        endif; 
    }
}
?>