<?php

interface Factory
{
    public function createButton();
}

abstract class GUIFactory {
    const WIN = 0;
    const MAC = 1;


    public static function getFactory($sys = '') {
        if ('' === $sys) {

        } else {
        if ($sys == 0) {
            return(new BrowserFactory());
            } else {
            return(new OfficeFactory());
            }
        }
    }
    //public abstract function createButton();
}
 
class BrowserFactory implements Factory {
    public function createButton() {
        return(new WinButton());
    }
}
 
class OfficeFactory implements Factory {
    public function createButton() {
        return(new OSXButton());
    }
}
 
abstract class Button {
    private $_caption;
    public abstract function render();
         
    public function getCaption(){
        return $this->_caption;
    }
    public function setCaption($caption){
    $this->_caption = $caption;
    }
}
 
class WinButton extends Button {
    public function render() {
    return "Je suis un WinButton: ".$this->getCaption();
    }
}
 
class OSXButton extends Button {
    public function render() {
        return "Je suis un OSXButton: ".$this->getCaption();
    }
}
 
$aFactory = GUIFactory::getFactory(GUIFactory::WIN);// it would be interesting to give a software type name as parameter, but it implies that existence is checked above in the flow
$aButton = $aFactory->createButton();
$aButton->setCaption("Démarrage");
echo $aButton->render() . "\n";
