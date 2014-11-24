<?php

namespace controllers {
    
    use Config;
    use DirectoryIterator;
    use View;
    use Tres\core\app\Version as TresVersion;
    
    class AboutController extends BaseController {
        
        public function renderPage(){
            View::make('about', [
                'appName' => Config::get('app/name'),
                'packagesInfo' => $this->_getPackagesInfo()
            ]);
        }
        
        protected function _getPackagesInfo(){
            $vendors = ['Tres'];
            $data = '';
            
            foreach($vendors as $vendor){
                $directories = new DirectoryIterator(VENDOR_DIR.'/'.$vendor);
                
                foreach($directories as $dir){
                    if($dir->isDot() || !$dir->isDir()){
                        continue;
                    }
                    
                    $package = $dir->getFilename();
                    $packageInfoFile = VENDOR_DIR.'/'.$vendor.'/'.$package.'/PackageInfo.php';
                    
                    if(is_readable($packageInfoFile)){
                        include_once($packageInfoFile);
                        
                        $packageInfo = $vendor.'\\'.$package.'\\PackageInfo';
                        
                        $data .= '<h3>'.$package.'</h3>';
                        $data .= '<p>';
                        
                        foreach($packageInfo::get() as $name => $values){
                            if(is_array($values)){
                                $value = '';
                                
                                foreach($values as $k => $v){
                                    $value .= $k.', ';
                                }
                                
                                $value = rtrim($value, ', ');
                            } else{
                                $value = $values;
                            }
                            
                            $data .= ucfirst($name).': '.$value.'<br />';
                            unset($value);
                        }
                        
                        $data .= '</p>';
                    }
                }
            }
            
            return $data;
        }
        
    }
    
}
