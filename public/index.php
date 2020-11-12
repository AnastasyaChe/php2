
<?php
// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// $a1 = new A();
// $a2 = new A();
// var_dump($a1->foo());//1
// var_dump($a2->foo());//2
// var_dump($a1->foo());//3
// var_dump($a2->foo());//4
//так как статическая переменная. она не своя у каждого объекта, а одна на всех.

// class A {
//     public function foo() {
//         static $x = 0;
//         echo ++$x;
//     }
// }
// class B extends A {
// }
// $a1 = new A();
// $b1 = new B();
// var_dump($a1->foo()); //1
// var_dump($b1->foo()); //1
// var_dump($a1->foo()); //2
// var_dump($b1->foo()); //2
//так как наследуется в отдельный класс вместе со статическими переменными. и изменения в разных классах не влияют друг на друга.
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
var_dump($a1->foo()); //1
var_dump($b1->foo()); //1
var_dump($a1->foo()); //2
var_dump($b1->foo()); //3
//скобки после new A это срабатвание метода __construct(). Так метод этот не прописан в теле класса, можно не ставить скобки.