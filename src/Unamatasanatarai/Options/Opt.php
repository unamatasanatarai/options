<?php
/**
 * Options module
 */
if (class_exists('Opt')){
    use \Unamatasanatarai\Options\Option;

    class Opt {

        static public function get($slug = null)
        {
            $all = self::all();
            if(isset($all[$slug])){
                return $all[$slug];
            }
            return null;
        }

        static public function all()
        {
            $data = Option::all();

            $return = [];
            foreach($data as $item){
                $return[$item->name] = json_decode($item->value);
            }

            return $return;
        }

        static public function set($slug, $value)
        {
            $existing = Option::where('name', $slug)->first();
            if ($existing){
                $existing->value = json_encode($value);
                $existing->update();
            }else{
                $existing = Option::create([
                    'name' => $slug,
                    'value' => json_encode($value)
                ]);
            }
        }

        static public function render()
        {
            $options = self::all();
            $tpl = file_get_contents(dirname(__FILE__) . '/config.tpl');
            $tpl = str_replace('{TIMESTAMP}', date('Y-m-d H:i:s'), $tpl);
            $tpl = str_replace('{OPTIONS}', var_export($options, true), $tpl);
            File::put(config_path() . '/options.php', $tpl);
        }
    }
}