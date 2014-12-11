<?php

namespace Acme\Parsers;

class TagParser {

    public function parse($tags)
    {
        return preg_split('/ ?[,|] ?/', $tags);
    }

}
