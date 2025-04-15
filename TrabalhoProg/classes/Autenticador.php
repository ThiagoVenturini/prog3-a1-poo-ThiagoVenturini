<?php 

    class Autenticador {
        private static array $usuarios = [];  // Array de objetos para simular um banco de dados 

        public static function carregarUsuarios(): void {       // Carregar os usuarios salvos no array de objetos
            if (isset($_SESSION['usuarios'])) {
                self::$usuarios = $_SESSION['usuarios'];
            }
        }
    
        public static function salvarUsuarios(): void {    // Salvar os usuarios no array de objetos 
            $_SESSION['usuarios'] = self::$usuarios;
        }
    
        public static function RegistrarUsuarios(string $nome, string $email, string $senha): bool { //Registrar novos usuários
            self::carregarUsuarios();
        
            foreach (self::$usuarios as $usuario) {
                if ($usuario->getEmail() === $email) {
                    return false;
                }
            }
        
            self::$usuarios[] = new Usuario($nome, $email, $senha);
            self::salvarUsuarios();
            return true;
        }
        
    
        public static function LoginUsuarios(string $email, string $senha) {    // Login de Usuarios
            self::carregarUsuarios();
            foreach(self::$usuarios as $user) {
                if ($user->getEmail() === $email && $user->autenticar($senha)) {
                    return $user;
                }
            }
            return false;
        }
    }
?>