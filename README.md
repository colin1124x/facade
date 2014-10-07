## Rde\Facade
colin1124x/facade 1.0.1 2014-10
php >= 5.3

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
