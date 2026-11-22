<?php

class Post
{
    public string $title;
    public string $content;
    public string $date;

    public function __construct(string $title, string $content, string $date)
    {
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
    }

    /**
     * @return Post[]
     */
    public static function getAll(): array
    {
        return [
            new Post(
                "Мій перший пост",
                "Це приклад **першого поста** в блозі з *курсивом*.",
                date('d.m.Y')
            ),
            new Post(
                "MVC у PHP",
                "MVC — це поділ коду на **Model**, **View** і **Controller**.",
                date('d.m.Y')
            ),
            new Post(
                "Composer",
                "Composer підключає пакети, наприклад `erusev/parsedown`.",
                date('d.m.Y')
            ),
            new Post(
                "GitHub",
                "GitHub зберігає код і дозволяє вести історію змін.",
                date('d.m.Y')
            ),
            new Post(
                "Наступний крок",
                "- Пошук за назвою\n- **Markdown** через Parsedown\n- Картки **Bootstrap**",
                date('d.m.Y')
            ),
        ];
    }

    /**
     * @param string $query
     * @return Post[]
     */
    public static function searchByTitle(string $query): array
    {
        $posts = self::getAll();
        $query = mb_strtolower(trim($query));

        if ($query === '') {
            return $posts;
        }

        return array_values(array_filter(
            $posts,
            static fn(Post $post): bool => mb_strpos(mb_strtolower($post->title), $query) !== false
        ));
    }
}