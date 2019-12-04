<?php

session_start();

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

$con = conecta();
if(isset($_POST['btnLogin'])){
    if($email != "" && $senha != ""){
        if(($email == "user") && ($senha == "user")){
            $_SESSION['id'] = $senha;
            $_SESSION['nome'] = $email;
            header("Location: ?pagina=hortas-adm");
        }else{
          if(isset($_POST['email'])){
                    // VALIDAR PESSOA - cliente e produtor
                    $selectpessoa = "SELECT * FROM pessoa WHERE email=$email LIMIT 1";
                    $respessoa = mysqli_query($con, $selectpessoa);
                    if($respessoa){
                        $rowpessoa = mysqli_fetch_assoc($respessoa);
                        if(($respessoa['senha']) == $senha){
                            $_SESSION['idPessoa'] = $rowpessoa['idPessoa'];
                            $_SESSION['nome'] = $rowpessoa['nome'];
                            header("Location: ?pagina=venda");
                        }else{
                            $_SESSION['msg'] = "Usuário ou senha incorreto";
                            header("Location: ?pagina=login");
                        }
                    }
        }
      }
    }else{
        $_SESSION['msg'] = "Usuário ou senha incorreto";
        header("Location: ?pagina=login");
    }
}else{
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: ?pagina=login");
}
?>
