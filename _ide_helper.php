<?php

namespace {

    use phpDocumentor\Reflection\Types\Boolean;

    class Form {


        /**
         * html <b>form</b> tag
         * @param array $attributes
         * EX- <br>
         * echo Form::open(['url' => 'foo/bar', 'method' => 'put']) <br>
         * echo Form::open(['route' => 'route.name']) <br>
         * echo Form::open(['action' => 'Controller@method'])
         */

        public static function open(array $attributes)
        {}

        /**
         * html <b></form></b> tag
         */

        public static function close()
        {}

        /**
         * html <b>label</b> tag
         * @param string $name
         * @param string $displayText
         * @param array $attributes
         */
        public static function label(string $name, string $displayText, array  $attributes = [])
        {}

        /**
         * html input type <b>text</b> tag
         * @param string $name
         * @param string $displayText
         * @param array $attributes
         */
        public static function text(string $name, string $displayText, array  $attributes = []){}

        /**
         * html input type <b>hidden</b> tag
         * @param string $name
         * @param string $value
         * @param array $attributes
         */
        public static function hidden(string $name, string $value, array  $attributes = []){}

        /**
         * html input type <b>Text Area</b> tag
         * @param string $name
         * @param string $displayText
         * @param array $attributes
         */
        public static function textArea(string $name, string $displayText, array  $attributes = []){}


        /**
         * html input type <b>password</b> tag
         * @param string $name
         * @param array $attributes
         */
        public static function password(string $name, array  $attributes = []){}

        /**
         * html input type <b>email</b> tag
         * @param string $name
         * @param string|null $value
         * @param array $attributes
         */
        public static function email(string $name, string $value = null, array $attributes = []){}

        /**
         * html input type <b>file</b> tag
         * @param string $name
         * @param array $attributes
         */
        public static function file(string $name,array $attributes = []){}

        /**
         *  html input type <b>checkbox</b> tag
         * @param string $name
         * @param string $value
         * @param bool $isChecked
         */
        public static function checkbox(string $name, string $value, bool $isChecked = false){}


        /**
         *  html input type <b>radio</b> tag
         * @param string $name
         * @param string $value
         * @param bool $isChecked
         */
        public static function radio(string $name, string $value, bool $isChecked = false){}


        /**
         *  html input type <b>number</b> tag
         * @param string $name
         * @param string $value
         */
        public static function number(string $name, string $value){}


        /**
         *  html input type <b>number</b> tag
         * @param string $name
         * @param array $value
         * @param string|null $defaultValue
         * @param array $attribute
         */
        public static function select(string $name, array $value, string $defaultValue = null, array $attribute = []){}


        /**
         *  html select with Range tag
         * @param string $name
         * @param int $startValue
         * @param int $endValue
         * @param array $attribute
         */
        public static function selectRange(string $name, int $startValue, int $endValue, array $attribute = []){}

        /**
         *  html select with Month
         * @param string $name
         * @param array $attribute
         */
        public static function selectMonth(string $name, array $attribute = []){}


        /**
         *  html submit button
         * @param string $value
         * @param array $attribute
         */
        public static function submit(string $value, array $attribute = []){}


        /**
         * link to route
         * @param string $routeName
         * @param null $title
         * @param array $parameters
         * @param array $attributes
         * E.G. link_to_route('route.name', $title = null, $parameters = [], $attributes = []);
         */
        public static function link_to_route(string $routeName, $title = null, array $parameters = [], array $attributes = []){}


        /**
         * link to action
         * @param string $actonName
         * @param null $title
         * @param array $parameters
         * @param array $attributes
         * E.G. link_to_action('HomeController@getIndex', $title = null, $parameters = [], $attributes = []);
         */
        public static function link_to_action(string $actonName, $title = null, array $parameters = [], array $attributes = []){}



        /***************************************************************************************************************
         *
         *                               custom form component
         *
         **************************************************************************************************************/


        /**
         * textGroup
         * @param string $name
         * @param string|null $value
         * @param string|null $label
         * @param array|string[] $attributes
         * @param string|null $icon
         * @param string $col
         * @param string|null $group_class
         */
        public static function textGroup(string $name,
                                         string $value = null,
                                         string $label= null,
                                         array $attributes = ['required' => 'required'],
                                         string $icon= null,
                                         string $col = 'col-md-6',
                                         string $group_class = null){}

        /**
         * numberGroup
         * @param string $name
         * @param string|null $value
         * @param string|null $label
         * @param array|string[] $attributes
         * @param string|null $icon
         * @param string $col
         * @param string|null $group_class
         */
        public static function numberGroup(string $name,
                                         string $value = null,
                                         string $label= null,
                                         array $attributes = ['required' => 'required'],
                                         string $icon= null,
                                         string $col = 'col-md-6',
                                         string $group_class = null){}

        /**
         * textareaGroup
         * @param string $name
         * @param string|null $value
         * @param string|null $label
         * @param array|string[] $attributes
         * @param string|null $icon
         * @param string $col
         * @param string|null $group_class
         */
        public static function textareaGroup(string $name,
                                             string $value = null,
                                             string $label= null,
                                             array $attributes = [],
                                             string $icon= null,
                                             string $col = 'col-md-6',
                                             string $group_class = null){}

        /**
         * checkboxGroup
         * @param string $name
         * @param string|null $value
         * @param string|null $label
         * @param array|string[] $attributes
         * @param string $col
         * @param string|null $group_class
         */
        public static function checkboxGroup(string $name,
                                             string $value = null,
                                             string $label= null,
                                             array $attributes = [],
                                             string $col = 'col-md-6',
                                             string $group_class = null){}

        /**
         * selectGroup
         * @param string $name
         * @param string|null $value
         * @param array $defaultValue
         * @param string|null $label
         * @param array|string[] $attributes
         * @param string $icon
         * @param string $col
         * @param string|null $group_class
         */
        public static function selectGroup(string $name,
                                             string $value = null,
                                             array $defaultValue = [],
                                             string $label= null,
                                             array $attributes = [],
                                             string $icon = '',
                                             string $col = 'col-md-6',
                                             string $group_class = null){}

    }
}
