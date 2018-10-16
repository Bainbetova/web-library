<?  include '../js/edit_tag.js';
    include '../views/deleteTag.php';
    include '../models/model.php'; ?>
<? if (isset($_POST['submit'])) {
        $tag  = trim($_POST['tag']);
        $etag = trim($_POST['etag']);
    
        if (empty($tag) || empty($etag)) {
            exit('<p style="color: red; font-size: 14pt;">Заполните поле.</p>');
        }
    
        if (strlen($tag) > 30 || strlen($etag) > 30) {
            exit('<p style="color: red; font-size: 14pt;">Длина тега не должна превышать 30 символов.</p>');
        }    

        edit_tag($tag, $etag);
    }
?>