<?php

App::uses('AppController', 'Controller');

class InstaladorController extends AppController {

    public $uses = array('Configuracao');
    public $config_banco = array('host' => 'teste');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->title_for_layout = 'Instalador';
        $this->layout = 'instalador';
    }

    public function index() {
        $this->redirect($this->configuraBanco());
    }

    public function configuraBanco() {

        if ($this->request->is('post')) {
            $host = $this->request->data['Banco']['host'];
            $login = $this->request->data['Banco']['login'];
            $senha = $this->request->data['Banco']['senha'];
            $banco = $this->request->data['Banco']['database'];

            $this->config_banco['host'] = $host;

            $this->criaBanco($host, $login, $senha, $banco);

            $handle = fopen("../Config/database.php", "w+");
            $txt = "<?php
                    class DATABASE_CONFIG {
                     public \$default = array(
                        'datasource' => 'Database/Mysql',
                        'persistent' => false,
                        'host' => '$host',
                        'login' => '$login',
                        'password' => '$senha',
                        'database' => '$banco',
                        'prefix' => '',
                        //'encoding' => 'utf8',
                    );
                 }
                 ?>";
            if (fwrite($handle, $txt) === FALSE) {
                echo "Não foi possível escrever no arquivo";
                exit;
            }

            $this->redirect(array("action" => "configuraEmail"));
        }

        $this->set('title_for_layout', __('Configurar Banco') . ' - ' . $this->title_for_layout);
        $this->render('configura_banco');
    }

    public function criaBanco($host, $login, $senha, $db) {
        $server = $host;
        $usuario = $login;
        $senha = $senha;
        $banco = $db;

        $con_mysql = mysql_connect($server, $usuario, $senha) or die("Não foi possível a conexão com o servidor Mysql");
        $sql = "SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;";
        if (mysql_query($sql)) {
            $sql = "SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;";
            if (mysql_query($sql)) {
                $sql = "SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';";
                if (mysql_query($sql)) {
                    $sql = "SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';";
                    if (mysql_query($sql)) {
                        $sql = "CREATE SCHEMA IF NOT EXISTS `$banco` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
                        if (mysql_query($sql)) {
                            mysql_select_db($banco) or die("Não foi possível selecionar o banco de dados");
                        } else {
                            echo "erro - $sql";
                            exit(0);
                        }
                    } else {
                        echo "erro - $sql";
                        exit(0);
                    }
                } else {
                    echo "erro - $sql";
                    exit(0);
                }
            } else {
                echo "erro - $sql";
                exit(0);
            }
        } else {
            echo "erro - $sql";
            exit(0);
        }



        $script_sql = fopen("../banco/banco.sql", "r");
        $tam = filesize("../banco/banco.sql");
        $sql = "";
        while (!feof($script_sql)) {
            $linha = fgets($script_sql, $tam);

            $sql .= $linha;
            if (!strpos($linha, ";") === false) {
                //echo $sql;
                mysql_query($sql);
                //echo "<br>*****************************<br>";
                //exit(0);
                $sql = "";
            }
        }

        $script_sql = fopen("../banco/insert.sql", "r");
        $tam = filesize("../banco/insert.sql");
        $sql = "";
        while (!feof($script_sql)) {
            $linha = fgets($script_sql, $tam);

            $sql .= $linha;
            if (!strpos($linha, ";") === false) {
                //echo $sql;
                mysql_query($sql);
                //echo "<br>*****************************<br>";
                //exit(0);
                $sql = "";
            }
        }
    }

    public function criarUsuarioAdmin() {

        if ($this->request->is('post')) {
            $this->loadModel('Usuario');
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('controller' => 'usuarios', 'action' => 'login'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        
        $this->set('title_for_layout', __('Criar Usuário Administrador') . ' - ' . $this->title_for_layout);
        $this->render('criar_usuario_admin');
    }

    public function configuraEmail() {
        
        
        pr($this->request->data);
        exit;

        /* App::uses('ConnectionManager', 'Model');
          $dataSource = ConnectionManager::getDataSource('default');
          $username = $dataSource->config['login'];
          echo $dataSource->config['host'];
         */

        if ($this->request->data) {
            $var = $this->request->data['Email'];
            foreach ($var as $key => $value) {
                $$key = $value;
            }
            $txt = "<?php
            class EmailConfig {
                public \$smtp = array(
                    'transport' => 'Smtp',
                    'from' => array('$email' => '$nome'),
                    'host' => '$smtp ',
                    'port' => $porta,
                    'timeout' => 30,
                    'username' => '$usuario',
                    'password' => '$senha',
                    'client' => null,
                    'log' => false,
                    'charset' => 'utf-8',
                    'headerCharset' => 'utf-8',
                );
            }
            ?>";

            $handle = fopen("../Config/email.php", "w+");
            if (fwrite($handle, $txt) === FALSE) {
                echo "Não foi possível escrever no arquivo";
                exit;
            }
            $this->redirect(array("action" => "criarUsuarioAdmin"));
        }
        //echo $smtp;
        // echo "---".$fields['default']['host'];
        //echo $this->default['host'];

        $this->set('title_for_layout', __('Configurar E&#45;mail') . ' - ' . $this->title_for_layout);
    }

    /*   public function passo1() {
      $this->layout = 'instalador';
      } */
//
//    public function passo2() {
//        $this->layout = 'instalador';
//    }
//
//    public function passo3() {
//        $this->layout = 'instalador';
//    }
}
