**Спаггетти кода не нашел, старался всегда писать понятно и проекты не такие большие, чтобы где-то намудрить.


1.Шифрованный (таинственный) код (Cryptic Code)
Плохо назвал переменную, ни сразу понятно что это
$em = $this->getDoctrine()->getManager();
$em->persist($user);
$em->flush();

$result = mysqli_query($DBlink, "SELECT * FROM shelters WHERE id = {$shel_id}");
                $shelter = mysqli_fetch_assoc($result);
                $result2= mysqli_query($DBlink,"SELECT description FROM inquiries WHERE shelter_id = {$shel_id} ORDER BY id DESC;");
                $inquiry = mysqli_fetch_assoc($result2);

2.Интерфейсная солянка (Interface Soup)
Мне кажется, тут стоило разделить на несколько классов таких как: security,role, user

/**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name=$name;
        return $this;
    }
}

3. Часто использовал копипаст, так как плохо понимал, надо было больше печатать руками

4. Повторял один и тот же код на разных страницах. Стоило вынести в отдельный файл один раз.

<?php
                    session_start();
                    require_once('../src/db.php');
                    global $DBlink;
                    mysqli_query($DBlink,"SET NAMES UTF8");
                    mysqli_query($DBlink,"SET CHARACTER SET UTF8");
                    $user_id = $_SESSION['user_id'];
                    if($user_id !=null){
                        var_dump($user_id);
                        $get_image = mysqli_query($DBlink, "SELECT * FROM shelters WHERE user_id = {$user_id}");
                        $shelter_image = mysqli_fetch_array($get_image);
                        if($_SESSION['role'] == 'приют'){
                            if($shelter_image['imagename']==null){
                                printf("<img class='acc-img' src='../img/user.png'>");
                            }else{
                                printf("<img class='acc-img' src='".$shelter_image['imagepath'].$shelter_image['imagename']."'>");

                            }
                        }else{
                            printf("<img class='acc-img' src='../img/user.png'>");
                        }
                    } else{
                        printf("<img class='acc-img' src='../img/user.png'>");
                    }
                    ?>



