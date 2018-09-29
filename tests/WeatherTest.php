<?php

namespace Zhoubohan\Weather\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use Mockery\Matcher\AnyArgs;
use Zhoubohan\Weather\Exceptions\InvalidArgumentException;
use Zhoubohan\Weather\Exceptions\HttpException;
use Zhoubohan\Weather\Weather;
use PHPUnit\Framework\TestCase;


class WeatherTest extends TestCase
{	

	public function testGetWeatherWithInvalidType()
	{
		$c = new Weather('mock-key');
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage('Invalid type value:foo');
		$c->getWeather('beijing', 'foo');
		$this->fail('Faild to assert getWeather throw exception with invalid argument');
	}

	public function testGetWeatherWithInvalidFormat()
	{
		$c = new Weather('mock-key');
		$this->expectException(InvalidArgumentException::class);
		$this->expectExceptionMessage('Invalid response format:xml');
		$c->getWeather('beijing', 'now', 'xml');
		$this->fail('Faild to assert getWeather throw exception with invalid argument');
	}

	public function testGetWeather()
	{	
		// 创建模拟接口响应值。
		$response = new Response(200, [], '{"success": true}'); 
		// 创建模拟 http client。
		$client = \Mockery::mock(Client::class);
		//指定将会产生的形为
		$requesturl = "https://free-api.heweather.com/s6/weather/now";
		$client->allows()->get($requesturl, [
			'query' => [
				'key' => 'mock-key',
				'location' => 'beijing',
				'unit' => 'i',
				'lang' => 'zh',
			],
		])->andReturn($response);
			

		// 将 `getHttpClient` 方法替换为上面创建的 http client 为返回值的模拟方法。
		$c = \Mockery::mock(Weather::class, ['mock-key'])->makePartial();
		$c->allows()->getHttpClient()->andReturn($client);
		$this->assertSame(['success' => true], $c->getWeather('beijing'));

	}

	public function testGetWeatherWithGuzzleRuntimeException()
    {
        $client = \Mockery::mock(Client::class);
        $client->allows()
            ->get(new AnyArgs()) // 由于上面的用例已经验证过参数传递，所以这里就不关心参数了。
            ->andThrow(new \Exception('request timeout')); // 当调用 get 方法时会抛出异常。

        $w = \Mockery::mock(Weather::class, ['mock-key'])->makePartial();
        $w->allows()->getHttpClient()->andReturn($client);

        // 接着需要断言调用时会产生异常。
        $this->expectException(HttpException::class);
        $this->expectExceptionMessage('request timeout');

        $w->getWeather('beijing');
    }

	public function testGetHttpClient()
	{	
		$c = new Weather('mock-key');
		$this->assertInstanceOf(ClientInterface::class, $c->getHttpClient());

	}

	public function testSetGuzzleOptions()
	{
		$c = new Weather('mock-key');

		$this->assertNull($c->getHttpClient()->getConfig('timeout'));

        // 设置参数
        $c->setGuzzleOptions(['timeout' => 5000]);

        // 设置参数后，timeout 为 5000
        $this->assertSame(5000, $c->getHttpClient()->getConfig('timeout'));
	}
}