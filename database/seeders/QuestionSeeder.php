<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'What is the output of printf("%d", 10+5);',
                'options' => json_encode(['10', '15', '5', 'Compile Error']),
                'correct_option' => 1, // Correct answer is '15'
            ],
            [
                'question' => 'Which of the following is not a valid C variable name?',
                'options' => json_encode(['int', '_var', 'var_1', 'myVar']),
                'correct_option' => 0, // Correct answer is 'int'
            ],
            [
                'question' => 'What is the size of `int` in a 32-bit compiler?',
                'options' => json_encode(['2 bytes', '4 bytes', '8 bytes', '16 bytes']),
                'correct_option' => 1, // Correct answer is '4 bytes'
            ],
            [
                'question' => 'What will `sizeof(char)` return?',
                'options' => json_encode(['1', '2', '4', '8']),
                'correct_option' => 0, // Correct answer is '1'
            ],
            [
                'question' => 'Which keyword is used to prevent modification of a variable in C?',
                'options' => json_encode(['static', 'const', 'volatile', 'register']),
                'correct_option' => 1, // Correct answer is 'const'
            ],
            [
                'question' => 'What is the output of printf("%d", 3*3/3);',
                'options' => json_encode(['0', '3', '9', 'Compile Error']),
                'correct_option' => 1, // Correct answer is '3'
            ],
            [
                'question' => 'Which of the following is used to declare a pointer in C?',
                'options' => json_encode(['#', '*', '&', '%']),
                'correct_option' => 1, // Correct answer is '*'
            ],
            [
                'question' => 'Which of the following is a logical operator in C?',
                'options' => json_encode(['+', '&&', '/', '!']),
                'correct_option' => 1, // Correct answer is '&&'
            ],
            [
                'question' => 'Which header file is required for printf and scanf?',
                'options' => json_encode(['conio.h', 'stdio.h', 'stdlib.h', 'math.h']),
                'correct_option' => 1, // Correct answer is 'stdio.h'
            ],
            [
                'question' => 'What is the output of the following code? \n int x=5; printf("%d", ++x);',
                'options' => json_encode(['5', '6', 'Error', 'Undefined']),
                'correct_option' => 1, // Correct answer is '6'
            ],
            [
                'question' => 'What does PHP stand for?',
                'options' => json_encode(['Personal Home Page', 'PHP: Hypertext Preprocessor', 'Private Home Page', 'Public Home Page']),
                'correct_option' => 1, // Correct answer is 'PHP: Hypertext Preprocessor'
            ],
            [
                'question' => 'Which of the following is used to declare a variable in PHP?',
                'options' => json_encode(['var', '$', '@', '#']),
                'correct_option' => 1, // Correct answer is '$'
            ],
            [
                'question' => 'What is the correct way to end a PHP statement?',
                'options' => json_encode(['.', ';', '}', ':']),
                'correct_option' => 1, // Correct answer is ';'
            ],
            [
                'question' => 'Which function is used to include files in PHP?',
                'options' => json_encode(['import', 'include', 'require', 'Both include and require']),
                'correct_option' => 3, // Correct answer is 'Both include and require'
            ],
            [
                'question' => 'Which superglobal variable is used to access form data in PHP?',
                'options' => json_encode(['$_POST', '$_GET', '$_FORM', 'Both $_POST and $_GET']),
                'correct_option' => 3, // Correct answer is 'Both $_POST and $_GET'
            ],
            [
                'question' => 'Which of the following function is used to start a session in PHP?',
                'options' => json_encode(['start_session()', 'session_start()', 'begin_session()', 'session_begin()']),
                'correct_option' => 1, // Correct answer is 'session_start()'
            ],
            [
                'question' => 'What is the default file extension for PHP files?',
                'options' => json_encode(['.html', '.php', '.txt', '.js']),
                'correct_option' => 1, // Correct answer is '.php'
            ],
            [
                'question' => 'How can you connect to a MySQL database in PHP?',
                'options' => json_encode(['mysql_connect()', 'mysqli_connect()', 'pdo_connect()', 'connect_mysql()']),
                'correct_option' => 1, // Correct answer is 'mysqli_connect()'
            ],
            [
                'question' => 'What is the output of the following code? \n echo 5 + "5";',
                'options' => json_encode(['55', '10', 'Error', 'Undefined']),
                'correct_option' => 1, // Correct answer is '10'
            ],
            [
                'question' => 'Which of the following is used to output content in PHP?',
                'options' => json_encode(['print', 'echo', 'Both print and echo', 'output']),
                'correct_option' => 2, // Correct answer is 'Both print and echo'
            ],
            [
                'question' => 'What is Laravel?',
                'options' => json_encode([
                    'A PHP Framework',
                    'A JavaScript Library',
                    'A CSS Framework',
                    'A Database Management System'
                ]),
                'correct_option' => 0, // Correct answer: 'A PHP Framework'
            ],
            [
                'question' => 'Which command is used to create a new Laravel project?',
                'options' => json_encode([
                    'laravel init',
                    'php artisan make:project',
                    'laravel new project-name',
                    'php create laravel-project'
                ]),
                'correct_option' => 2, // Correct answer: 'laravel new project-name'
            ],
            [
                'question' => 'What is the default database system supported by Laravel?',
                'options' => json_encode([
                    'PostgreSQL',
                    'SQLite',
                    'MySQL',
                    'MongoDB'
                ]),
                'correct_option' => 2, // Correct answer: 'MySQL'
            ],
            [
                'question' => 'Which file is used for database configuration in Laravel?',
                'options' => json_encode([
                    'app/config.php',
                    'database.php',
                    'config/database.php',
                    'env/database.php'
                ]),
                'correct_option' => 2, // Correct answer: 'config/database.php'
            ],
            [
                'question' => 'Which command is used to create a new migration in Laravel?',
                'options' => json_encode([
                    'php artisan migration:create',
                    'php artisan make:migration',
                    'php artisan migrate:new',
                    'php artisan migration:new'
                ]),
                'correct_option' => 1, // Correct answer: 'php artisan make:migration'
            ],
            [
                'question' => 'What does ORM stand for in Laravel?',
                'options' => json_encode([
                    'Object Route Mapping',
                    'Object Relational Model',
                    'Object Relational Mapping',
                    'Object Resource Model'
                ]),
                'correct_option' => 2, // Correct answer: 'Object Relational Mapping'
            ],
            [
                'question' => 'What is the purpose of middleware in Laravel?',
                'options' => json_encode([
                    'To handle database migrations',
                    'To define application routes',
                    'To filter HTTP requests',
                    'To manage CSS and JavaScript files'
                ]),
                'correct_option' => 2, // Correct answer: 'To filter HTTP requests'
            ],
            [
                'question' => 'Which method is used to retrieve all records from a table in Laravel?',
                'options' => json_encode([
                    'getAll()',
                    'all()',
                    'fetch()',
                    'get()'
                ]),
                'correct_option' => 1, // Correct answer: 'all()'
            ],
            [
                'question' => 'What is the default templating engine used by Laravel?',
                'options' => json_encode([
                    'Twig',
                    'Blade',
                    'Smarty',
                    'Mustache'
                ]),
                'correct_option' => 1, // Correct answer: 'Blade'
            ],
            [
                'question' => 'Which command is used to clear the cache in Laravel?',
                'options' => json_encode([
                    'php artisan cache:clear',
                    'php artisan clear:cache',
                    'php artisan cache:delete',
                    'php artisan remove:cache'
                ]),
                'correct_option' => 0, // Correct answer: 'php artisan cache:clear'
            ],
        ];

        foreach ($questions as $q) {
            Question::create($q);
        }
    }
}
