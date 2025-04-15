<?php 
    Class Sessao {
        public static function iniciar(): void {   // Iniciar sesão fazendo validação também para não abrir mais de uma sessão 
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }
    
        public static function set(string $chave, $valor): void {  
            $_SESSION[$chave] = $valor;
        }
    
        public static function get(string $chave) {
            return $_SESSION[$chave] ?? null;
        }
    
        public static function destruir(): void {        //Destuindo a sessão, removendo todas as variaveis e destruindo a sessão
            session_unset();
            session_destroy();
        }
    }
?> 