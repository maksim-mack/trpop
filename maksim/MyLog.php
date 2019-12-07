<?php
    namespace maksim;

    /**
     *
     */
    class Log extends \core\LogAbstract implements \core\LogInterface
    {
        public static function log($str)
        {
            self::Instance()->log[]=$str;
        }
        public static function write()
        {
            self::Instance()->_write();
        }
        public function _write()
        {
            echo implode("\n", self::Instance()->log);

            $d = new \DateTIme();
            if (!is_dir("./log")) {
                mkdir("./log");
            }
            $filename = $d -> format('d-m-Y\TH-i-s.u').".log";
            file_put_contents("./log/".$filename, date(DATE_COOKIE)." | ".implode("\n", self::Instance()->log));
        }
    }
