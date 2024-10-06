/* Um exemplo de jogo-da-velha simples*/

#include <stdio.h>
#include <stdlib.h>

char matriz [3] [3]; /* Matriz do jogo */

char check(void);
void init_matriz(void);
void get_player_move(void);
void get_computer_move(void);
void disp_matriz(void);

void main(void)
{
	char done;
	
	printf("Este e o jogo da velha. \n \n");
	printf("\n Voce estara jogando contra o computador \n");
	
	done = ' ';
	init_matriz();
	do{
		disp_matriz();
		get_player_move();
		done = check(); /*verifica se há vencedor*/
		if (done!=' ')break; /*vencedor*/
		get_computer_move();
		done = check(); /* verifica se há vencedor*/		
	} while (done == ' ');
	if (done == 'X') printf ("Voce Ganhou! \n");
	else printf("Eu ganhei!!!! \n");
	disp_matriz(); /* mostra as posições finais */	
}
 	 /* Inicializa a matriz */
 	 
 	 void init_matriz(void)
 	 { 
 	 	int i, j;
 	 	
 	 		for(i=0; i<3 ; i++)
 	 	    for(j=0; j<3 ; j++) matriz[i][j] = ' '; 	 		 
	 }
	  
	  /* Obtèm a sua jogada */
	  void get_player_move (void)
	  { 
	  	int x, y;
	  	
	  		printf("Digite as Coordenadas para o X: ");
	  		scanf("%d %d", &x, &y);
	  		
	  		x--; y--;
	  		
	  			if(matriz[x][y] != ' ') {
	  				printf("Posicao invalida, tente novamente. \n");	
	  				get_player_move();
				  } 
				  else matriz [x][y] = 'X'; 		
	  }
	  
	  /* Obtém uma jogada do computador */
	  
	  void get_computer_move (void)
	  {
	  	int i, j;
	  	for (i=0 ; i<3; i++){
	  		for(j=0 ; j<3; j++)	
	  			if (matriz[i][j]==' ') break;
	  		if(matriz[i][j]==' ') break;
		  }
		  
		  if (i*j == 9){
			printf("Empate! \n");
			exit(0);
		  } 
		  else 
		  	matriz [i][j] ='0';	
	  }
	  
	  /* Mostra a matriz na tela */
	  void disp_matriz(void)
	  {
	  	int t;
	  	
	  	for (t=0; t<3;t++) {
	  		printf("  %c   |  %c   |   %c  ", matriz [t][0], matriz [t][1], matriz[t][2]);
	  		
	  		if(t!=2) printf("\n------|------|------ \n");
		  }
		  printf("\n");
	  }
	  
	  /* Verifica se há um vencedor */
	  char check (void)
	  {
	   	int i;
	  		
	  	for(i=0 ; i<3 ; i++) /* Verifica as linhas */
	  		if(matriz[i][0] == matriz[i][1]	&&
			   matriz[i][0] == matriz[i][2]) return matriz [i][0];	

	  	for(i=0 ; i<3 ; i++) /* Verifica as colunas */
	  		if(matriz[0][i] == matriz[1][i]	&&
			   matriz[0][i] == matriz[2][i]) return matriz [0][i];	
		
		/* Testa as diagonais*/
		
		if(matriz [0][0] == matriz [1][1]  &&
		   matriz [1][1] == matriz [2][2]) 
		   return matriz [0][0];
		    
		if(matriz [0][2] == matriz [1][1]  &&
		   matriz [1][1] == matriz [2][0])
		   return matriz [0][2];
		
		return ' ';
	  }
