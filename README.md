<h1>mnemesong/fit</h1>

[![Latest Stable Version](http://poser.pugx.org/mnemesong/fit/v)](https://packagist.org/packages/mnemesong/fit)
[![PHP Version Require](http://poser.pugx.org/mnemesong/fir/require/php)](https://packagist.org/packages/mnemesong/fit)
[![License](http://poser.pugx.org/mnemesong/fit/license)](https://packagist.org/packages/mnemesong/fit)

- The documentation is written in two languages: Russian and English.
- Документация написана на двух языках: русском и английском.


<hr>

<h2>General description / Общее описание</h2>

<h3>ENG:</h3>
<p>The package provides objects and an interface for expression of specifications (describes the conditions for fetching 
records from storage). For quick construction, use Fit builder (for example Fit::field('name')->val('=', 'John')).</p>

<h3>RUS:</h3>
<p>Пакет предоставляет объекты и интерфейс для выражения спецификаций (описывают услоние выборки записей из хранилища).
Для быстрого построения используется билдер Fit (например Fit::field('name')->val('=', 'John'))</p>
<hr>

<h2>Requirements / Требования</h2>
<ul>
    <li>PHP >= 7.4</li>
    <li>Composer >=2.0</li>
</ul>
<hr>

<h2>Installation / Установка</h2>
<p>composer require "mnemesong/fit"</p>
<hr>

<h2>Conditions / Условия</h2>

<h3>RUS:</h3>
<p>Спецификации позволяют указывать условие для поиска или отбора записей, в том числе логически сложные.</p>

<h4>Выразитель спецификаций Fit</h4>
<p>Выразитель спецификаций Fit позволяет быстро выражать любые спецификации различных типов.</p>

<h4>Спецификации сравнения с массивом</h4>
<p>Имеют общий вид: <code>Fit::field(string &lt;имя колонки&gt;)->arr(string &lt;оператор сравнения&gt;, array &lt;массив сравнения&gt;)</code></p>
<h6>Допустимые операторы для сравнения с массивом:</h6>
<ul>
    <li><code>"in"</code> - проверяет вхождение значения в колонке в массив сравнения</li>
    <li><code>"!in"</code> - проверяет отсутствие вхождения значения в колонке в массив сравнения</li>
</ul>
<h6>Пример:</h6>
<p><code>Fit::field("age")->arr("in", [11, 22, 33, 44, 55])</code></p>
<br>

<h4>Спецификации сравнения колонок таблицы</h4>
<p>Имеют общий вид: <code>Fit::field(string &lt;имя колонки&gt;)->field(string &lt;оператор сревнения&gt;, string &lt;имя колонки&gt;)</code></p>
<h6>Допустимые операторы для сравнения колонок таблицы:</h6>
<ul>
    <li><code>"="</code> - проверяет равенство значений в двух колонках одной строки таблицы</li>
    <li><code>"!="</code> - проверяет неравенство значений в двух колонках одной строки таблицы</li>
    <li><code>">"</code>, <code>"!>"</code>, <code>">="</code>, <code>"<"</code>, <code>"!<"</code>, <code>"<="</code> - 
        сравнивают значений в двух колонках одной строки таблицы</li>
</ul>
<p>Дополнительно можно указать способ сравнения:</p>
<ul>
    <li><code>->asStr()</code> - посимвольное сравнение с лево направо - способ сравнения по умолчанию.</li>
    <li><code>->asNum()</code> - Попытка приведения к числам и сравнения как чисел.</li>
</ul>
<h6>Пример:</h6>
<p><code>Fit::field("index")->field(">", "index")->asNum()</code></p>
<br>

<h4>Спецификации сравнения cо скалярным значением</h4>
<p>Имеют общий вид: <code>Fit::field(string &lt;имя колонки&gt;)->val(string &lt;оператор сравнения&gt;, string &lt;строковое значение&gt;)
</code></p>
<h6>Допустимые операторы для сравнения cо скалярным значением:</h6>
<ul>
    <li><code>"="</code> - проверяет равенство (NULL-безопасное) значения колонке с указанным строковым значением</li>
    <li><code>"!="</code> - проверяет неравенство (NULL-безопасное) значения колонке с указанным строковым значением</li>
    <li><code>">"</code>, <code>"!>"</code>, <code>">="</code>, <code>"<"</code>, <code>"!<"</code>, <code>"<="</code> 
        - сравнивает значения колонке с указанным значением</li>
</ul>
<p>Дополнительно можно указать способ сравнения:</p>
<ul>
    <li><code>->asStr()</code> - посимвольное сравнение с лево направо - способ сравнения по умолчанию.</li>
    <li><code>->asNum()</code> - Попытка приведения к числам и сравнения как чисел.</li>
</ul>
<h6>Пример:</h6>
<p><code>Fit::field("bank-account")->val("!<", "71239-318941")->asStr()</code></p>
<br>

<h4>Спецификации унарного сравнения</h4>
<p>Имеют общий вид: <code>Fit::field(string &lt;имя колонки&gt;)->is(string &lt;оператор сравнения&gt;)</code></p>
<h6>Допустимые операторы для унарного сравнения:</h6>
<ul>
    <li><code>"null"</code> - проверяет равенство значения колонки NULL</li>
    <li><code>"!null"</code> - проверяет неравенство значения колонки NULL</li>
</ul>
<h6>Пример:</h6>
<p><code>Fit::field("bank-account")->is("!null")</code></p>
<br>

<h4>Сложные составные спецификации</h4>
<p>Методы: <code>Fit::andThat()</code>, <code>Fit::orThat()</code> помогают составлять сложные логические
композиции из спецификаций</p>
<h6>Пример:</h6>
<p><code>Fit::andThat([<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field("bank-account")->val("!<", "71239-318941")->asStr(),<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field("name")->is("null")<br>
])</code></p>
<br>

<h4>Унарные составные спецификации</h4>
<p>В настоящий момент этот класс представляет единственная спецификация отрицания (NULL-безопасного): 
<code>Fit::notThat()</code></p>
<h6>Пример:</h6>
<p><code>Fit::notThat(Fit::field("bank-account")->val("!<", "71239-318941")->asStr())</code></p>
<br>
<hr>

<h2>Converting Structures to fit conditions / Преобразование структур в условия</h2>

<h3>RUS</h3>
<p>Метод <code>Fit::struct()</code> позволяет превращать Структуры в спецификации. Это полезно когда нужно проверить 
в каком-то хранилище наличие записей по многим параметрам похожих на конкретную структуру.</p>
<h4>Пример</h4>
<code>
$struct = new Structure(['name' => 'Victoria', 'age' => 21]);<br>
$spec = Fit::struct($struct);<br></code>
<p>Результат будет эквивалентен следующему коду:</p>
<code>$spec = Fit::andThat([<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field('name')->val('=','Victoria')->asStr(),<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field('age')->val('=','21')->asStr(),<br>
]);</code>

<h2>License / Лицензия</h2>
- MIT
<hr>

<h2>Contacts / Контакты</h2>
- Anatoly Starodubtsev "Pantagruel74"
- tostar74@mail.ru
