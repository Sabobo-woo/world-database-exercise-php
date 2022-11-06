<?php

class Region 
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $slug = null;

    public function save()
    {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();

        } 
    }

    public function delete() 
    { 
        $query = "DELETE FROM `regions` WHERE `id` = ?";
        delete($query, [$this->id]);
    }


    private function insert() 
    {
        $query = "INSERT INTO `regions` (`name`, `slug`) VALUES (?, ?)";
        insert($query, [$this->name, $this->slug]);

        $this->id = last_insert_id();
    }

    private function update()    //type here is void becuase it wont return any value 
    { 
        $query = "UPDATE `regions` SET `name` = ?, `slug`= ? WHERE `id` = ?";
        update($query, [$this->name, $this->slug, $this->id]);


    }

  

}

// $myNewRegion = new Region();
// $myNewRegion->name = $_POST['name'];
// $myNewRegion->insert();

