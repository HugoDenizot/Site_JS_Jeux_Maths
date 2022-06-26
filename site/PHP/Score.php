<?php


class Score{
    private $val;
    private $pseudo;
    function __construct(int $i, string $pseudo){
        $this->val = $i;
        $this->pseudo = $pseudo;
    }

    /**
     * @return int
     */
    public function getVal(): int
    {
        return $this->val;
    }

    /**
     * @param int $val
     */
    public function setVal(int $val)
    {
        $this->val = $val;
    }

    /**
     * @param string $pseudo
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }


}

