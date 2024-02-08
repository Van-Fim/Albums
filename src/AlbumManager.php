<?
class AlbumManager
{
    public $AuthSystem;
    public $DbManager;
    private $mysqli;
    public function __construct($DbManager, $AuthSystem)
    {
        $this->DbManager = $DbManager;
        $this->AuthSystem = $AuthSystem;
        $this->mysqli = $this->DbManager->mysqli;
    }
    public function getAllAlbums()
    {
        $result = $this->mysqli->query("SELECT * FROM albums");
        return $result;
    }
    public function getDetailAlbum($id)
    {
        $st = $this->mysqli->prepare("SELECT * FROM albums WHERE id=?");
        $st->bind_param("s", $id);
        $st->execute();
        $result = $st->get_result();
        return $result->fetch_assoc();
    }
    public function addAlbum($name, $description)
    {
        $user = $this->AuthSystem->GetUser();
        if ($user['id'] == 0)
            return;
        $st = $this->mysqli->prepare("INSERT INTO albums (name, description, user_id) VALUES (?, ?, ?)");
        $st->bind_param("ssi", $name, $description, $user['id']);
        $st->execute();
    }
    public function addComment($image_id, $comment)
    {
        $user = $this->AuthSystem->GetUser();
        if ($user['id'] == 0)
            return;
        $st = $this->mysqli->prepare("INSERT INTO comments (image_id, user_id, comment) VALUES (?, ?, ?)");
        $st->bind_param("iis", $image_id, $user['id'], $comment);
        $st->execute();
    }
    public function updateLike($image_id, $type)
    {
        $user = $this->AuthSystem->GetUser();
        if ($user['id'] == 0)
            return;
        $st = $this->mysqli->prepare("DELETE FROM likes WHERE image_id = ? AND user_id=?");
        $st->bind_param("ii", $image_id, $user['id']);
        $st->execute();
        if($st->affected_rows > 0)
            return;
        $st = $this->mysqli->prepare("INSERT INTO likes (image_id, user_id, type) VALUES (?, ?, ?)");
        $st->bind_param("iis", $image_id, $user['id'], $type);
        $st->execute();
    }
    public function deleteAlbum($id)
    {
        $user = $this->AuthSystem->GetUser();
        if ($user['id'] == 0)
            return;
        $st = $this->mysqli->prepare("DELETE FROM albums WHERE id = ?");
        $st->bind_param("s", $id);
        $st->execute();
        $result = $st->get_result();
        $st = $this->mysqli->prepare("SELECT * FROM images WHERE album_id=?");
        $st->bind_param("i", $id);
        $st->execute();
        $images = $st->get_result();
        while ($image = $images->fetch_assoc()) {
            $this->deleteImage($image['id'], $id);
        }
        return $result;
    }
    public function addImage()
    {
        $path = "/uploads/images/";
        $allowedMimeTypes = ['image/jpeg', 'image/bmp', 'image/png', 'image/gif'];
        $user = $this->AuthSystem->GetUser();
        if ($user['id'] == 0)
            return;
        $albumId = $_POST['album_id'];
        if ($albumId == 0)
            return;
        $file = $_FILES['file'];
        $allImgs = $this->mysqli->query("SELECT * FROM images")->fetch_all();
        $fileName = "img" . $user['id'] . count($allImgs) . $file["name"];
        $fullPath = $_SERVER['DOCUMENT_ROOT'] . $path . $fileName;
        $sPath = $path . $fileName;
        if (!in_array($file["type"], $allowedMimeTypes))
            return;

        if (move_uploaded_file($file['tmp_name'], $fullPath)) {
            $st = $this->mysqli->prepare("INSERT INTO images (path, album_id, name, description) VALUES (?, ?, ?, ?)");
            $st->bind_param("siss", $sPath, $albumId, $_POST['name'], $_POST['description']);
            $st->execute();
        }
    }
    public function deleteImage($id, $album_id)
    {
        $user = $this->AuthSystem->GetUser();
        if ($user['id'] == 0)
            return;
        $st = $this->mysqli->prepare("SELECT * FROM images WHERE id=? AND album_id=?");
        $st->bind_param("ii", $id, $album_id);
        $st->execute();
        $result = $st->get_result();
        $result = $result->fetch_assoc();
        if ($result['id'] == 0)
            return;

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $result['path'])) {
            unlink($_SERVER['DOCUMENT_ROOT'] . $result['path']);
        }
        $st = $this->mysqli->prepare("DELETE FROM comments WHERE image_id = ?");
        $st->bind_param("i", $id);
        $st->execute();
        $result = $st->get_result();

        $st = $this->mysqli->prepare("DELETE FROM likes WHERE image_id = ?");
        $st->bind_param("i", $id);
        $st->execute();
        $result = $st->get_result();

        $st = $this->mysqli->prepare("DELETE FROM images WHERE id = ?");
        $st->bind_param("i", $id);
        $st->execute();
        $result = $st->get_result();
        return $result;
    }
    public function getAlbumImages($album_id)
    {
        $st = $this->mysqli->prepare("SELECT * FROM images WHERE album_id=?");
        $st->bind_param("i", $album_id);
        $st->execute();
        $result = $st->get_result();
        return $result;
    }

    public function getImage($id)
    {
        $st = $this->mysqli->prepare("SELECT * FROM images WHERE id=?");
        $st->bind_param("i", $id);
        $st->execute();
        $result = $st->get_result();
        return $result->fetch_assoc();
    }
    public function getImageComments($image_id)
    {
        $st = $this->mysqli->prepare("SELECT * FROM comments WHERE image_id=?");
        $st->bind_param("i", $image_id);
        $st->execute();
        $result = $st->get_result();
        return $result;
    }
    public function getImageLikes($image_id)
    {
        $st = $this->mysqli->prepare("SELECT * FROM likes WHERE image_id=? AND type=?");
        $TYPE = 'DISLIKE';
        $st->bind_param("is", $image_id, $TYPE);
        $st->execute();
        $list = $st->get_result()->fetch_all();
        $likes['DISLIKES'] = $list;

        $st = $this->mysqli->prepare("SELECT * FROM likes WHERE image_id=? AND type=?");
        $TYPE = 'LIKE';
        $st->bind_param("is", $image_id, $TYPE);
        $st->execute();
        $list = $st->get_result()->fetch_all();
        $likes['LIKES'] = $list;
        return $likes;
    }
}