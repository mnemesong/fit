<h1>mnemesong/fit</h1>

[![Latest Stable Version](http://poser.pugx.org/mnemesong/fit/v)](https://packagist.org/packages/mnemesong/fit)
[![PHP Version Require](http://poser.pugx.org/mnemesong/fir/require/php)](https://packagist.org/packages/mnemesong/fit)
[![License](http://poser.pugx.org/mnemesong/fit/license)](https://packagist.org/packages/mnemesong/fit)

- The documentation is written in two languages: Russian and English.
- Документация написана на двух языках: русском и английском.


<hr>

<h2>General description / Общее описание</h2>

<h3>RUS:</h3>
<p>Пакет предоставляет объекты и интерфейс для выражения условий поиска (описывают услоние выборки записей из хранилища).
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
<p>Выразитель условий поиска Fit позволяет быстро выражать любые условия поиска различных типов.</p>
<hr>

<h2>Field with array comparing fits / Сравнение значений поля таблицы с массивом</h2>

<h3>ENG:</h3>
<p>They have the general form: <code>Fit::field(string &lt;column name&gt;)
->arr(string &lt;comparison operator&gt;, array &lt;comparison array&gt;)</code></p>
<h6>Allowed operators for array comparison:</h6>
<ul>
    <li><code>"in"</code> - checks whether the value in the column is included in the comparison array</li>
    <li><code>"!in"</code> - checks if the value in the column is not included in the comparison array</li>
</ul>
<h6>Example:</h6>
<p><code>Fit::field("age")->arr("in", [11, 22, 33, 44, 55])</code></p>

<h3>RUS:</h3>
<p>Имеют общий вид: <code>Fit::field(string &lt;имя колонки&gt;)->arr(string &lt;оператор сравнения&gt;, array &lt;массив сравнения&gt;)</code></p>
<h6>Допустимые операторы для сравнения с массивом:</h6>
<ul>
    <li><code>"in"</code> - проверяет вхождение значения в колонке в массив сравнения</li>
    <li><code>"!in"</code> - проверяет отсутствие вхождения значения в колонке в массив сравнения</li>
</ul>
<h6>Пример:</h6>
<p><code>Fit::field("age")->arr("in", [11, 22, 33, 44, 55])</code></p>
<hr>

<h2>Fields comparing fits / Сравнение колонок таблицы</h2>

<h3>ENG:</h3>
<p>They have a general form: <code>Fit::field(string &lt;column name&gt;)->field(string &lt;comparison operator&gt;, string &lt;column name&gt;)</code></p>
<h6>Allowed operators for comparing table columns:</h6>
<ul>
    <li><code>"="</code> - checks the equality of values in two columns of the same table row</li>
    <li><code>"!="</code> - checks the inequality of values in two columns of the same table row</li>
    <li><code>">"</code>, <code>"!>"</code>, <code>">="</code>, <code>"<"</code>, <code>"!<"</code>, <code>"<="</code> -
        compare values in two columns of one table row</li>
</ul>
<p>Additionally, you can specify the comparison method:</p>
<ul>
    <li><code>->asStr()</code> - character-by-character comparison from left to right - the default comparison method.</li>
    <li><code>->asNum()</code> - Attempt to cast to numbers and compare as numbers.</li>
</ul>
<h6>Example:</h6>
<p><code>Fit::field("index")->field(">", "index")->asNum()</code></p>

<h3>RUS:</h3>
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
<hr>

<h2>Field with scalar val comparing / Сравнение поля cо скалярным значением</h2>

<h3>ENG:</h3>
<p>They have the general form: <code>Fit::field(string &lt;column name&gt;)->val(string &lt;comparison operator&gt;, string &lt;string value&gt;)
</code></p>
<h6>Allowed operators to compare against a scalar value:</h6>
<ul>
    <li><code>"="</code> - checks for equality (NULL-safe) of the column value with the specified string value</li>
    <li><code>"!="</code> - checks if the (NULL-safe) value of the column with the specified string value is not equal</li>
    <li><code>">"</code>, <code>"!>"</code>, <code>">="</code>, <code>"<"</code>, <code>"!<"</code>, <code>"<="</code>
        - compares the values of the column with the specified value</li>
</ul>
<p>Additionally, you can specify the comparison method:</p>
<ul>
    <li><code>->asStr()</code> - character-by-character comparison from left to right - the default comparison method.</li>
    <li><code>->asNum()</code> - Attempt to cast to numbers and compare as numbers.</li>
</ul>
<h6>Example:</h6>
<p><code>Fit::field("bank-account")->val("!<", "71239-318941")->asStr()</code></p>

<h3>RUS:</h3>
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
<hr>

<h2>Unary fits / Унарные сравнения</h2>

<h3>ENG:</h3>
<p>They have the general form: <code>Fit::field(string &lt;column name&gt;)->is(string &lt;comparison operator&gt;)</code></p>
<h6>Allowed operators for unary comparison:</h6>
<ul>
    <li><code>"null"</code> - checks if column value is NULL</li>
    <li><code>"!null"</code> - checks if column value is null</li>
</ul>
<h6>Example:</h6>
<p><code>Fit::field("bank-account")->is("!null")</code></p>

<h3>RUS:</h3>
<p>Имеют общий вид: <code>Fit::field(string &lt;имя колонки&gt;)->is(string &lt;оператор сравнения&gt;)</code></p>
<h6>Допустимые операторы для унарного сравнения:</h6>
<ul>
    <li><code>"null"</code> - проверяет равенство значения колонки NULL</li>
    <li><code>"!null"</code> - проверяет неравенство значения колонки NULL</li>
</ul>
<h6>Пример:</h6>
<p><code>Fit::field("bank-account")->is("!null")</code></p>
<hr>

<h2>Complexity composite fits / Сложные составные условия поиска</h2>

<h3>ENG:</h3>
<p>Methods: <code>Fit::andThat()</code>, <code>Fit::orThat()</code> help to compose complex logical
compositions from search terms</p>
<h6>Example:</h6>
<p><code>Fit::andThat([<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field("bank-account")->val("!<", "71239-318941")->asStr(),<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field("name")->is("null")<br>
])</code></p>

<h3>RUS:</h3>
<p>Методы: <code>Fit::andThat()</code>, <code>Fit::orThat()</code> помогают составлять сложные логические
композиции из условий поиска</p>
<h6>Пример:</h6>
<p><code>Fit::andThat([<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field("bank-account")->val("!<", "71239-318941")->asStr(),<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field("name")->is("null")<br>
])</code></p>
<hr>

<h2>Unary composite fits / Унарные составные условия поиска</h2>

<h3>ENG:</h3>
<p>Currently, this class represents the only negation (NULL-safe) search condition:
<code>Fit::notThat()</code></p>
<h6>Example:</h6>
<p><code>Fit::notThat(Fit::field("bank-account")->val("!<", "71239-318941")->asStr())</code></p >

<h3>RUS:</h3>
<p>В настоящий момент этот класс представляет единственная условие поиска отрицания (NULL-безопасного): 
<code>Fit::notThat()</code></p>
<h6>Пример:</h6>
<p><code>Fit::notThat(Fit::field("bank-account")->val("!<", "71239-318941")->asStr())</code></p>
<hr>

<h2>Converting Structures to fit conditions / Преобразование структур в условия</h2>

<h3>ENG</h3>
<p>The <code>Fit::struct()</code> method allows you to turn Structures into search conditions. This is useful when you need to check
in some storage, the presence of records in many respects similar to a specific structure.</p>
<h4>Example</h4>
<code>
$struct = new Structure(['name' => 'Victoria', 'age' => 21]);<br>
$spec = Fit::struct($struct);<br></code>
<p>The result will be equivalent to the following code:</p>
<code>$spec = Fit::andThat([<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field('name')->val('=','Victoria')->asStr(),<br>
&nbsp;&nbsp;&nbsp;&nbsp;Fit::field('age')->val('=','21')->asStr(),<br>
]);</code>

<h3>RUS</h3>
<p>Метод <code>Fit::struct()</code> позволяет превращать Структуры в условия поиска. Это полезно когда нужно проверить 
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
<hr>

<h2>License / Лицензия</h2>
- MIT
<hr>

<h2>Contacts / Контакты</h2>
- Anatoly Starodubtsev "Pantagruel74"
- tostar74@mail.ru
