<h1 align="center"> weather </h1>

<p align="center"> a weather sdk.</p>

![StyleCI build status](https://github.styleci.io/repos/150829300/shield)

## 安装

```shell
$ composer require zhoubohan/weather -vvv
```

## 配置
在使用本扩展之前，你需要去[和风天气](https://www.heweather.com/)注册账号，然后创建应用，获取应用的 API Key。

## 使用

```php
use Zhoubohan\Weather\Weather;

$key = 'xxxxxxxxxxxxxxxxxxxxxx';

$c = new Weather($key);
```
### 获取实时天气
```php
$res = $c->getLiveWeather('北京');
```
示例:
```json
{
    "HeWeather6": [
        {
            "basic": {
                "cid": "CN101010100",
                "location": "北京",
                "parent_city": "北京",
                "admin_area": "北京",
                "cnty": "中国",
                "lat": "39.90498734",
                "lon": "116.4052887",
                "tz": "+8.00"
            },
            "update": {
                "loc": "2018-09-29 13:46",
                "utc": "2018-09-29 05:46"
            },
            "status": "ok",
            "now": {
                "cloud": "50",
                "cond_code": "100",
                "cond_txt": "晴",
                "fl": "60.8",
                "hum": "21",
                "pcpn": "0.0",
                "pres": "1014",
                "tmp": "68.0",
                "vis": "56.3",
                "wind_deg": "297",
                "wind_dir": "西北风",
                "wind_sc": "3",
                "wind_spd": "27.4"
            }
        }
    ]
}
```	
### 获取天气预报
```php
$res = $c->getForecastWeather('北京');
```
示例:
```json
{
    "HeWeather6": [
        {
            "basic": {
                "cid": "CN101010100",
                "location": "北京",
                "parent_city": "北京",
                "admin_area": "北京",
                "cnty": "中国",
                "lat": "39.90498734",
                "lon": "116.4052887",
                "tz": "+8.00"
            },
            "update": {
                "loc": "2018-09-29 13:46",
                "utc": "2018-09-29 05:46"
            },
            "status": "ok",
            "daily_forecast": [
                {
                    "cond_code_d": "100",
                    "cond_code_n": "100",
                    "cond_txt_d": "晴",
                    "cond_txt_n": "晴",
                    "date": "2018-09-29",
                    "hum": "37",
                    "mr": "20:41",
                    "ms": "10:00",
                    "pcpn": "0.0",
                    "pop": "0",
                    "pres": "1015",
                    "sr": "06:09",
                    "ss": "17:58",
                    "tmp_max": "69.8",
                    "tmp_min": "50.0",
                    "uv_index": "5",
                    "vis": "32.2",
                    "wind_deg": "4",
                    "wind_dir": "北风",
                    "wind_sc": "3-4",
                    "wind_spd": "37.0",
                    "wind_spd_d": "0.0",
                    "wind_spd_n": "0.0"
                },
                {
                    "cond_code_d": "100",
                    "cond_code_n": "100",
                    "cond_txt_d": "晴",
                    "cond_txt_n": "晴",
                    "date": "2018-09-30",
                    "hum": "34",
                    "mr": "21:23",
                    "ms": "11:05",
                    "pcpn": "0.0",
                    "pop": "0",
                    "pres": "1014",
                    "sr": "06:10",
                    "ss": "17:56",
                    "tmp_max": "68.0",
                    "tmp_min": "55.4",
                    "uv_index": "5",
                    "vis": "32.2",
                    "wind_deg": "290",
                    "wind_dir": "西北风",
                    "wind_sc": "4-5",
                    "wind_spd": "49.9",
                    "wind_spd_d": "0.0",
                    "wind_spd_n": "0.0"
                },
                {
                    "cond_code_d": "100",
                    "cond_code_n": "100",
                    "cond_txt_d": "晴",
                    "cond_txt_n": "晴",
                    "date": "2018-10-01",
                    "hum": "39",
                    "mr": "22:11",
                    "ms": "12:10",
                    "pcpn": "0.0",
                    "pop": "7",
                    "pres": "1018",
                    "sr": "06:11",
                    "ss": "17:55",
                    "tmp_max": "71.6",
                    "tmp_min": "51.8",
                    "uv_index": "6",
                    "vis": "32.2",
                    "wind_deg": "4",
                    "wind_dir": "北风",
                    "wind_sc": "4-5",
                    "wind_spd": "41.8",
                    "wind_spd_d": "0.0",
                    "wind_spd_n": "0.0"
                }
            ]
        }
    ]
}
```
### 获取生活指数
```php
$res = $c->getLifestyleWeather('北京');
```
示例:
```json
{
    "HeWeather6": [
        {
            "basic": {
                "cid": "CN101010100",
                "location": "北京",
                "parent_city": "北京",
                "admin_area": "北京",
                "cnty": "中国",
                "lat": "39.90498734",
                "lon": "116.4052887",
                "tz": "+8.00"
            },
            "update": {
                "loc": "2018-09-29 13:46",
                "utc": "2018-09-29 05:46"
            },
            "status": "ok",
            "lifestyle": [
                {
                    "type": "comf",
                    "brf": "舒适",
                    "txt": "白天不太热也不太冷，风力不大，相信您在这样的天气条件下，应会感到比较清爽和舒适。"
                },
                {
                    "type": "drsg",
                    "brf": "较舒适",
                    "txt": "建议着薄外套、开衫牛仔衫裤等服装。年老体弱者应适当添加衣物，宜着夹克衫、薄毛衣等。"
                },
                {
                    "type": "flu",
                    "brf": "较易发",
                    "txt": "天气较凉，较易发生感冒，请适当增加衣服。体质较弱的朋友尤其应该注意防护。"
                },
                {
                    "type": "sport",
                    "brf": "较适宜",
                    "txt": "天气较好，但因风力稍强，户外可选择对风力要求不高的运动，推荐您进行室内运动。"
                },
                {
                    "type": "trav",
                    "brf": "适宜",
                    "txt": "天气较好，风稍大，但温度适宜，是个好天气哦。适宜旅游，您可以尽情地享受大自然的无限风光。"
                },
                {
                    "type": "uv",
                    "brf": "中等",
                    "txt": "属中等强度紫外线辐射天气，外出时建议涂擦SPF高于15、PA+的防晒护肤品，戴帽子、太阳镜。"
                },
                {
                    "type": "cw",
                    "brf": "较适宜",
                    "txt": "较适宜洗车，未来一天无雨，风力较小，擦洗一新的汽车至少能保持一天。"
                },
                {
                    "type": "air",
                    "brf": "良",
                    "txt": "气象条件有利于空气污染物稀释、扩散和清除，可在室外正常活动。"
                }
            ]
        }
    ]
}
```
### 在 Laravel 中使用

在 Laravel 中使用也是同样的安装方式，配置写在 `config/services.php` 中：

```php
    .
    .
    .
     'weather' => [
        'key' => env('WEATHER_API_KEY'),
    ],
```

然后在 `.env` 中配置 `WEATHER_API_KEY` ：

```env
WEATHER_API_KEY=xxxxxxxxxxxxxxxxxxxxx
```

可以用两种方式来获取 `Overtrue\Weather\Weather` 实例：

#### 方法参数注入

```php
    .
    .
    .
    public function edit(Weather $weather) 
    {
        $response = $weather->getLiveWeather('深圳');
    }
    .
    .
    .
```

#### 服务名访问

```php
    .
    .
    .
    public function edit() 
    {
        $response = app('weather')->getLiveWeather('深圳');
    }
    .
    .
    .

```

## 参考

- [和风天气](https://www.heweather.com/)
- [overtrue](https://github.com/overtrue)

## License

MIT