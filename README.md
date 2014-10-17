## Rde\Facade

實驗性(參考自[illuminate](https://github.com/illuminate))

[![Build Status](https://travis-ci.org/colin1124x/facade.svg)](https://travis-ci.org/colin1124x/facade)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/colin1124x/facade/badges/quality-score.png)](https://scrutinizer-ci.com/g/colin1124x/facade)
[![Code Coverage](https://scrutinizer-ci.com/g/colin1124x/facade/badges/coverage.png)](https://scrutinizer-ci.com/g/colin1124x/facade)
[![Latest Stable Version](https://poser.pugx.org/rde/facade/v/stable.svg)](https://packagist.org/packages/rde/facade) 
[![Total Downloads](https://poser.pugx.org/rde/facade/downloads.svg)](https://packagist.org/packages/rde/facade) 
[![Latest Unstable Version](https://poser.pugx.org/rde/facade/v/unstable.svg)](https://packagist.org/packages/rde/facade) 
[![License](https://poser.pugx.org/rde/facade/license.svg)](https://packagist.org/packages/rde/facade)

### 使用
#### 初始化

    // 指定IoC容器(不限定哪種IoC容器實作,但此IoC容器必須有實作ArrayAccess界面)
    Rde\Facade::setApplication($app);

#### 實作系統服務外觀物件

    // Cache
    use Rde\Facade;

    class CacheFacade extends Facade
    {
        protected static getAccessName()
        {
            // 回傳服務實體在IoC容器內的註冊名稱
            return 'cache';
        }
    }
