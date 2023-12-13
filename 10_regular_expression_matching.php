<?php

declare(strict_types=1);

final class Solution
{
    private const DOT = '.';
    private const ASTA = '*';

    private array $memo = [];

    /**
     * $param array<int, {
     *   'type' => 'char|dot|asta',
     *   'c' => 'a-z'
     * }>
     */
    private array $token = [];

    public function isMatch(
        string $s,
        string $p,
    ): bool
    {
        $this->memo = [];
        return $this->dp(0, 0, $s, $p);
    }

    private function dp(
        int $i, 
        int $j, 
        string $text, 
        string $pattern
    ): bool
    {
        if (isset($this->memo[$i][$j])) {
            return $this->memo[$i][$j] == true;
        }
        $ans = false;
        if ($j === strlen($pattern)) {
            $ans = $i === strlen($text);
        } else {
            $firatMatch = ($i < strlen($text)
                && ($pattern[$j] === $text[$i] ||
                    $pattern[$j] === self::DOT));
            if ($j + 1 < strlen($pattern) && $pattern[$j + 1] === self::ASTA) {
                $ans = $this->dp(
                    $i,
                    $j + 2,
                    $text,
                    $pattern
                ) || $firatMatch && $this->dp($i + 1, $j, $text, $pattern);
            } else {
                $ans = $firatMatch && $this->dp($i+1, $j+1, $text, $pattern);
            }
        }
        $this->memo[$i][$j] = $ans;
        return $ans;
    }
}

$solution = new Solution();
assert($solution->isMatch('aa','a') === false);
assert($solution->isMatch('aa','a*'));
assert($solution->isMatch('ab','.*'));
assert($solution->isMatch('aab','c*a*b'));
assert($solution->isMatch('mississi','mis*is*p'));
assert($solution->isMatch('mississippi','mis*is*p*.') === false);
assert($solution->isMatch('mississippi','mis*is*ip*.'));
assert($solution->isMatch('aab','c*a*b'));
assert($solution->isMatch('ab','.*c') === false);
assert($solution->isMatch('aaaaaaaaaaaaaaaaaaa','a*a*a*a*a*a*a*a*a*b') === false);
