<?php
date_default_timezone_set("PRC");

/**
 * 1.静态属性用于保存类的公有数据
 * 2. 静态方法里面智能访问静态属性
 * 3. 静态成员不需要实例化对象就可以访问
 * 4. 类的内部可以通过self或者static关键字访问自身静态成员
 * 5. 可以通过parent关键字访问父类的静态成员
 * 6. 可以通过类的名称在类定义外部访问静态成员
*/

//类的定义以关键字class开始，后面跟着这个类的名称。类的命名通常每个单词的第一个字母大写，以中括号开始和结束。
class NbaPlayer{
    public $name="Jordan";
    public $height="198cm";
    public $weight="98kg";
    public $team="Bull";
    public $playerNumber="23";
}
class NbaPlayer extends Human {
    //定义属性
    public $team="Bull"
    public $playerNumber="23";
    private $age = "40";

    //静态属性定义时在访问控制关键字后面添加static关键字即可
    public static $president = "David Stern";
    //静态方法定义
    public static function changePresident($newPrsdt){
        //在类定义中使用静态成员的时候，用self关键字后面跟着::操作符即可。注意，在访问静态成员的时候，::后面需要跟$符号
        self::$president = $newPrsdt;
        static::$president = $newPrsdt;
        // 使用parent关键字就能够访问父类的静态成员
        echo parent::$sValue."\n";
        $this->age; //静态方法内不能访问
    } 

    // 构造函数，在对象被实例化的时候自动调用
    // 析构函数通常被用于清理程序使用的资源，比如打印机
    function __construct($name, $height, $weight, $team, $palyerNumber){
        echo "In NbaPlayer constructor";
        $this->name =$name;
        //$this是php里面的伪变量，表示对象自身，可以通过$this->方式访问对象的属性和方法
        $this->height = $height;
        $this->weight = $weight;
        $this->team =$team;
        $this->playerNumber = $playerNumber;
    }

    //析构函数，在程序结束后自动调用
    function __destruct(){
        echo "Destroying ". $this->name
    }
    //定义方法
    public function run(){
        echo "Running";
    }

    public function jump(){
        echo "Jumping";
    }
}

//类到对象的实例化
//类的实例化为对象时使用关键字New
//new之后跟类的名称和一对括号
$jordan = new NbaPlayer("Jordan","198cm","98kg","Bull","23");
//对象中的属性成员可以通过->符号来访问
echo $jordan->name.
//对象中的成员方法可以通过->符号来访问
$jordan->dribble();
$jordan->pass();

//每一次用new实例化对象的时候，都会用类名后面的参数列表调用构造函数
$james = new NbaPlayer("James", "203cm", "120kg", "Heat", "6");
echo $james->name.
//通过把变量设置为null，可以触发析构函数的调用
//当对象不会再被使用的时候，会触发析构函数
$james1=&$james;
$james = null;
echo "From now on James will not be used"

$jordan = new NbaPlayer("Jordan", "198cm", "98kg", "Bull", "23");
$james = new NbaPlayer("James", "203cm", "120kg", "Heat", "6");

//在类定义外部访问静态属性，我们可以用类名加::操作符的方法来访问类的静态成员
echo NbaPlayer::$president 
NbaPlayer::changePresident("Adam Silver");
echo NbaPlayer::$president;


// 子类中编写跟父类方法名完全一致的方法可以完成对父类方法的重写
// 对于不想被任何类继承的类，可以添加final
// 添加final关键字能够禁止子类重写

// 1. parent关键字可以用于调用父类中被子类重写了的方法
// 2.self关键字可以用于访问类自身的成员方法，也可以用于访问自身的静态成员和类常量；不能用于访问类自身的属性；使用常量的时候不需要在常量名称前面添加$符号
// 3. static关键字用于访问类自身定义的静态成员，访问静态属性时需要在属性前面添加$符号

// 可以用instanceof关键字来判断某个对象是否实现了某个接口
var_dump($obj instanceof ICanEat);

function checkEat($obj){
    if($obj instanceof ICanEat){
        $obj->eat('food');
    }else{
        echo "The obj can't eat. \n";
    }
}

checkEat($obj);
checkEat($monkey);

// 可以用extends让接口继承接口
interface ICanPee extends ICanEat{
    public function pee();
}

//当类实现子接口时，父接口定义的方法也需要在这个类里面具体实现
class Human1 implements ICanPee{
    public function pee(){}
    public function eat($food){}
}

魔术方法
class MagicTest{
    public function __tostring(){
        return "This is the Class MagicTest";
    }
    public function __invoke($x){
        echo "__invoke called with parameter ".$x."\n";
    }
    // 方法的重载
    public function __call($name, $arguments){
        echo "Calling " . $name . "with parameters: " . implode(", ", $arguments)."\n";
    }
    //静态方法的重载
    public static function __callStatic($name, $arguments){
        echo "Static calling " . $name . " with parameters: " . implode(", ", $arguments). "\n";
    }
}

$obj = new MagicTest();
echo $obj;

$obj(5);

$obj->runTest("para1","para2");
MagicTest::runTest("para1", "para2");