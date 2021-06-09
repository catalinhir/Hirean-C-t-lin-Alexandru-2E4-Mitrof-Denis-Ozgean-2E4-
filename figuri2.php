<?php

class BD
{


    private static $conexiuneBD = NULL;
    public static function getConnection()
    {
        if (is_null(self::$conexiuneBD)) {
            self::$conexiuneBD = new PDO('mysql:host=localhost;dbname=tw', 'root', '');
        }
        return self::$conexiuneBD;

    }
}

class CRUD extends Figura
{
    public function adaugaUser($username, $password, $email)  //create
    {
        $sql = "INSERT INTO users (username,password,email) VALUES (:username, :password, :email)";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere -> execute([
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'email' => $email
        ]);
    }
    public function afiseazaUsers(){  //read
        $sql = "SELECT * FROM users";
        $cerere = BD::getConnection()->prepare($sql);
        $cerere->execute();
        return $cerere->fetchAll(PDO::FETCH_ASSOC);
    }
    public function modificaUser($id, $username, $email){
        $sql = "UPDATE users SET username = :username, email=:email, updated_at= date('Y/m/d') WHERE id = :id";
        $cerere = BD::getConnection()->prepare($sql);
        return $cerere->execute([
            'id' => $id,
            'username' => $username,
            'email' => $email
        ]);
    }
    public function stergeFigura($id){
        $sql = "DELETE FROM figuri WHERE id = ?";
        $cerere = BD::getConnection()->prepare($sql);
        return $cerere->execute([$id]);
    }
    public function stergeFiguriDupaTip($figura){
        $sql = "DELETE FROM figuri WHERE figura = ?";
        $cerere = BD::getConnection()->prepare($sql);
        return $cerere->execute([$figura]);
    }
}

class User{
    private $username;
    private $password;
    private $email;
    private $createdAt;
    private $updatedAt;
}


class ConstanteMatematice
{
    public static $PI = 3.141592653;
    public static $euler = 2.71;
}


trait Rotire
{
    public function roteste($unghi)
    {
        echo "M-am rotit cu " . $unghi . " grade.";
    }
}

trait Colorare
{
    public function coloreaza($culoare)
    {
        echo "M-am colorat in " . $culoare;
        return $culoare;
    }
}


interface iFiguraGeometrica
{
    public function oferaNume();

    public function oferaArie();

    public function oferaPerimetru();

    public function oferaCuloare();
}

abstract class Figura
{
    public function oferaNume()
    {
        return get_class($this);
    }
}

class Dreptunghi extends Figura implements iFiguraGeometrica
{
    use Rotire, Colorare;

    private $lungime;
    private $latime;
    private $culoare;

    public function __construct(int $lung, int $lat)
    {
        $this->lungime = $lung;
        $this->latime = $lat;
    }

    public function oferaLungime(){
        return $this->lungime;
    }
    public function oferaArie()
    {
        return $this->lungime * $this->latime;
    }

    public function oferaPerimetru()
    {
        return ($this->lungime + $this->latime) * 2;
    }

    public function oferaCuloare()
    {
        return $this->culoare;
    }
    public function setCuloare($culoare)
    {
        $this->culoare = $culoare;
    }

    public function __toString()
    {
        return "Sunt un " . self::oferaNume() . " de arie " . $this->oferaArie();
    }
}

class Patrat extends Dreptunghi implements iFiguraGeometrica
{
    private $latura;
    public $culoare;

    public function __construct(int $lat)
    {
        parent::__construct($lat, $lat);
        $this->latura = $lat;
    }
    public function oferaCuloare()
    {
        return $this->culoare;
    }
    public function setCuloare($culoare)
    {
        $this->culoare = $culoare;
    }
}

class Cerc extends Figura implements iFiguraGeometrica
{
    use Colorare;
    private $culoare;
    public function __construct($raza)
    {
        $this->raza = $raza;
    }

    public function oferaArie()
    {
        return $this->raza * $this->raza * ConstanteMatematice::$PI;
    }

    public function oferaPerimetru()
    {
        return $this->raza * 2 * ConstanteMatematice::$PI;
    }

    public function oferaCuloare()
    {
        return $this->culoare;
    }
    public function setCuloare($culoare)
    {
        $this->culoare = $culoare;
    }
}

class Diform extends Figura
{
    public function oferaArie()
    {
        return 0;
    }

    public function oferaPerimetru()
    {
        return 0;
    }
}


function doSomething(iFiguraGeometrica $fig)
{
    echo $fig->oferaNume() . ' de arie ' . $fig->oferaArie();
}


$d = new Dreptunghi(3, 4);
$d->setCuloare("Galben");

echo $d;


echo "<br />";

$p = new Patrat(3);
echo $p;
$p->setCuloare("Verde");
echo "<br />";

$c = new Cerc(5);
echo $c->oferaArie();
$c->setCuloare("Albastru");

$x = new Diform();
echo $x->oferaArie();
echo "<hr />";

doSomething($c);  /// nu merge si cu x pentru ca nu implementeaza interfata
echo "<br />";

$p->roteste(15);

echo "<br />";
$c->coloreaza("Rosu");
//$c->roteste(15);
echo "<br />";

$crud = new CRUD();
//$crud ->adaugaFigura($p->oferaNume(),$p->oferaCuloare(),$p->oferaPerimetru(),$p->oferaArie());
//$crud -> modificaFigura(2,$c->oferaNume(),$c->oferaCuloare(),$c->oferaPerimetru(),$c->oferaArie());
//crud->stergeFigura(5);
//$crud->stergeFiguriDupaTip(Patrat);
$crud -> modificaUser(2, "user223", "email2@email2.com");


