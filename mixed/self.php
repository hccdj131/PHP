<?php

在静态函数中，self和static可以调用静态属性和静态函数（没有实例化类，因此不能调用非静态的属性和函数）。
在非静态函数中，self和static可以调用静态属性和静态函数以及非静态函数

static函数与普通函数有什么区别：static函数在内存中只有一份，普通函数在每个被调用中维持一份拷贝。

静态函数会被自动分配在一个一直使用的存储区，直到退出应用程序实例，避免了调用函数时压栈出栈，速度快很多。
关键字“static”，译成中文就是“静态的”，所以内部函数又称静态函数。但此处“static”的含义不是指存储方式，而是指对函数的作用域仅局限于本文件。 使用内部函数的好处是：不同的人编写不同的函数时，不用担心自己定义的函数，是否会与其它文件中的函数同名，因为同名也没有关系。