<?php

class postLoader
{
    private array $allPosts = [];


    public function setPosts(string $fileName): void
    {
        foreach ($this->readFile($fileName) as $temp) {
            $this->allPosts[] = $temp;
        }
    }

    public function getPosts(): array
    {
        return $this->allPosts;
    }

    public function readFile(string $fileName): ?array
    {
        if (!file_get_contents($fileName)) {
            return null;
        }
        try {
            return json_decode(file_get_contents($fileName), true, 512, JSON_THROW_ON_ERROR);

        } catch (JsonException $e) {
            if ($e) {
                var_dump($e);
            }
            return null;
        }
    }

    public function writeGuestbook(string $fileName, Post $post): void
    {
        if (!file_get_contents($fileName)) {
            $toAdd[] = $post->makeArray();
            try {
                file_put_contents($fileName, json_encode($toAdd, JSON_THROW_ON_ERROR));
            } catch (JsonException $e) {
                if ($e) {
                    var_dump($e);
                }
                return;
            }
        } else {
            try {


                $toAdd[] = $post->makeArray();
                foreach ($this->readFile($fileName) as $temp) {
                    $toAdd[] = $temp;
                }
                file_put_contents($fileName, json_encode($toAdd, JSON_THROW_ON_ERROR));

            } catch (JsonException $e) {
                if ($e) {
                    var_dump($e);
                }
                return;
            }
        }
    }

}
