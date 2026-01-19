<?php

namespace App\AiAgents;

use LarAgent\Agent;

class EduHelperAgent extends Agent
{
    protected $name = 'EduHelperAgent';
    protected $history = 'in_memory';

    /**
     * Instructions shown for agent definition
     */
    public function instructions(): string
    {
        return <<<PROMPT
You are a friendly educational assistant for school students.

Rules:
- Greet politely.
- Answer ONLY:
  1. Solar System
  2. Fractions
  3. Water Cycle
- Keep responses under 60 words.
- If outside scope, reply:
"I can only help with Solar System, Fractions, or Water Cycle for now"
PROMPT;
    }


    public function prompt(string $message): string
    {
        return $message;
    }


    public function respond(string|null $message = null): string
    {
        $messageLower = strtolower($message);

        if (
            !str_contains($messageLower, 'solar') &&
            !str_contains($messageLower, 'fraction') &&
            !str_contains($messageLower, 'water')
        ) {
            return "I can only help with Solar System, Fractions, or Water Cycle for now 😊";
        }

        return parent::respond($message);
    }


     /**
     * Main response logic
     */
    public static function handleChat(?string $message = null): string
    {
        if (!$message) {
            return "Hello! I can help you learn about the Solar System, Fractions, or the Water Cycle 😊";
        }

        $msg = strtolower($message);

        if (str_contains($msg, 'solar')) {
            return "Hello! The Solar System has the Sun at its center, with eight planets, moons, asteroids, and comets orbiting around it.";
        }

        if (str_contains($msg, 'fraction')) {
            return "Hi! A fraction shows part of a whole. It is written with a numerator on top and a denominator at the bottom.";
        }

        if (str_contains($msg, 'water')) {
            return "Hello! The water cycle explains how water evaporates, condenses into clouds, and falls back to Earth as rain.";
        }

        return "I can only help with Solar System, Fractions, or Water Cycle for now 😊";
    }
}