<?php

class Base_View_Base {
//    protected $_header = 'app/tmpl/header.phtml';
//    protected $_footer = 'app/tmpl/footer.phtml';
    /**
     * Файл шаблона
     * @var string
     */
    public $template;
    /**
     * Массив переменных-маркеров шаблона
     * @var array
     */
    private $_Vars;
    /**
     * Конструктор, инициализируем свойства класса
     *
     */
    public function __construct()
    {
    }
    /**
     * Отображает шаблон
     */
    public function render()
    {
        //include $this->_header;
        if (file_exists($this->template)) {
            include $this->template;
        }
        //include $this->_footer;
    }
    /**
     * Функция доступа к элементу массива
     * переменных-маркеров шаблона
     * @param string $Varname
     * @return mixed
     */
    public function __get($VarName)
    {
        if (array_key_exists($VarName, $this->_Vars)) {
            return $this->_Vars[$VarName];
        }
        return NULL;
    }
    /**
     * Функция сэтящая во вью любую переменную в контроллере
     * по типу $this->view->key = $value
     *
     */

    public function __set($key, $value)
    {
        $this->_Vars[$key] = $value;
    }

} 