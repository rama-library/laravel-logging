<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class LoggingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testLogging()
    {
        Log::info("Hello Info");
        Log::warning("Hello Warning");
        Log::error("Hello Error");
        Log::critical("Hello Critical");

        self::assertTrue(true);
    }

    public function testContext(){
        Log::info("Hello Info", ["user" => "rama"]);

        assertTrue(true);
    }

    public function withContext(){
        Log::withContext(["user" => "rama"]);

        Log::info("Hello Info");
        Log::info("Hello Info");
    }

    public function testChannel(){
        $slacklogger = Log::channel("slack");
        $slacklogger->error("Hello Slack");

        Log::info("Hello Laravel");
        self::assertTrue(true);
    }

    public function testFileHandler(){
        $file_logger = Log::channel("file");
        $file_logger->info("Hello File Handler");
        $file_logger->warning("Hello File Handler");
        $file_logger->error("Hello File Handler");
        $file_logger->critical("Hello File Handler");

        self::assertTrue(true);
    }

    
}
