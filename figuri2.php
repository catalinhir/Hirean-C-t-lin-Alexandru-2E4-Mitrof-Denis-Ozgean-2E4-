<?php
include('validationreg.php');

class BD
{


    private static $conexiuneBD = NULL;

    public static function getConnection()
    {
        if (is_null(self::$conexiuneBD)) {
            self::$conexiuneBD = new PDO('mysql:host=localhost;dbname=inreguser', 'root', '');
        }
        return self::$conexiuneBD;

    }
}

class CRUD extends Paste
{

    public function verificaUser($username)
    {
        $sql = "SELECT username FROM users WHERE username=$username";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            if (($_POST['username']) == $result['username'])
                array_push($errors, 'Username indisponibil');
        }
    }

    public function adaugaPaste($nume, $text, $user_id)  //create
    {
        $sql = "INSERT INTO pastes (nume,text,version,user_id) VALUES (:nume, :text, 1,:user_id)";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute([
            'nume' => $nume,
            'text' => $text,
            'user_id' => $user_id
        ]);
    }


    public function afiseazaPasteVersiune($version)
    {  //read
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $idCod = substr($actual_link, strpos($actual_link, "+") - strlen($actual_link));
        $sql = "SELECT text FROM pastes WHERE code_id=$idCod AND version = $version";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            return $result['text'];
        }
    }

    public function afiseazaPaste($id)
    {  //read
        $sql = "SELECT text FROM pastes WHERE code_id=$id AND version = 1";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            return $result['text'];
        }
    }

    public function getNrVersiuni()
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $idCod = substr($actual_link, strpos($actual_link, "+") - strlen($actual_link));
        $sql = "SELECT COUNT(*) as cnt FROM pastes WHERE code_id=$idCod";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            return $result['cnt'];
        }
    }

    public function getPasteType($id)
    {
        $sql = "SELECT type FROM pastes WHERE code_id=$id";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            return $result['type'];
        }
    }

    public function checkifcontributor()
    {
        if (isset($_SESSION['id'])) {
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $idCod = substr($actual_link, strpos($actual_link, "+") - strlen($actual_link));
            $sql = "SELECT contributor_id FROM contributors WHERE code_id = $idCod";
            $cerere = BD::getConnection()->prepare($sql);
            $cerere->execute();
            $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $result) {
                if ($_SESSION['id'] == $result['contributor_id'])
                    return 1;
            }
            return 0;
        }
        return 0;
    }

    public function addContributor($code_id, $contributor_username)
    {
        $sql = "SELECT id FROM users WHERE username='$contributor_username'";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetch(PDO::FETCH_ASSOC);
        $string_product = implode(',', $results);
        //  print_r($results);
        $sql = "INSERT INTO contributors(code_id,contributor_id) VALUES (?, ?)";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute([$code_id, $string_product]);
        echo $string_product . ' ';
    }

    public function afiseazaNumePaste()
    {
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $code_id = substr($actual_link, strpos($actual_link, "+") + 1);
        $sql = "SELECT DISTINCT nume FROM pastes WHERE code_id=$code_id";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            return $result['nume'];
        }
    }

    public function checkIfIsUserCode()
    {
        if (isset($_SESSION["id"])) {
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $user_id = substr($actual_link, strpos($actual_link, "=") + 1, 1);
            if ($_SESSION["id"] == $user_id)
                return 1;
        }
        return 0;
    }

    public function afiseazaListaPaste()
    {  //read
        $sql = "SELECT DISTINCT nume, user_id, code_id FROM pastes";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);

        foreach ($results as $result) {
            $link = "seeCode.php?user=" . $result['user_id'] . "+" . $result['code_id'];
            echo "<a href= $link >" . $result['nume'] . "</a>";
            '<br>';
        }
    }

    public function afiseazaListaPasteUser($id)
    {  //read
        $sql = "SELECT DISTINCT nume, user_id, code_id FROM pastes WHERE user_id=$id";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            $link = "seeCode.php?user=" . $result['user_id'] . "+" . $result['code_id'];
            echo "<a href= $link >" . $result['nume'] . "</a>";
            '<br>';
        }
    }

    public function afiseazaListaPasteOtherUsers($id)
    {  //read
        $sql = "SELECT DISTINCT nume, user_id, code_id FROM pastes WHERE user_id<>$id OR user_id is null";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $results = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) {
            $nume = $result['nume'];
            $link = "seeCode.php?user=" . $result['user_id'] . "+" . $result['code_id'];
            echo '<a href= "' . $link .'" ><i class="far fa-clipboard"></i>' . $nume . '</a>';
            '<br>';
        }
    }


    public function afiseazalistacoduri()
    {
        $sql = "SELECT DISTINCT nume, user_id, code_id FROM pastes";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        $result = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach (BD::getConnection()->query($sql) as $row) {
            $nume = $row['nume'];
            $link = "seeCode.php?user=" . $row['user_id'] . "+" . $row['code_id'];
              echo '<li><a href= "' . $link .'" ><i class="far fa-clipboard"></i> ' . $nume . '</a></li>';
//
        }
    }

    public function modificaPaste($id, $text)
    {
        $sql = "SELECT code_id, nume, text, MAX(version) as version, user_id, type FROM pastes WHERE code_id = ?";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute([$id]);
        $test = $cerere->fetchObject('Paste');
        $sql = "INSERT INTO pastes (code_id,nume,text,version,user_id,type) VALUES (?, ?, ?, ?, ?, ?)";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute([$test->code_id, $test->nume, $text, $test->version + 1, $test->user_id, $test->type]);

    }

    public function verificaAcelasiText($id, $text)
    {
        $sql = "SELECT code_id, nume, text, version, user_id, type FROM pastes WHERE code_id = ?";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute([$id]);
        $test = $cerere->fetchAll(PDO::FETCH_ASSOC);
        foreach ($test as $row) {
            if ($row['text'] == $text)
                return 0;
        }
        return 1;
    }


    public function stergePaste($id)
    {
        $sql = "DELETE FROM pastes WHERE code_id = '$id'";
        $cerere = BD::getConnection()->prepare($sql);
        return $cerere->execute([$id]);
    }


}

class Paste
{
    public $nume;
    public $text;
    public $version;
    public $type;
}



