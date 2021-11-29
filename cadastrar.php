<div class="titulo-pagina">
    <?php echo $titulo.'<span>'.$subtitulo.'</span>'; ?>
</div>
<?php
    if(validation_errors() != false) {
        echo '<div class="alert">';
            echo '<b>Algum campo obrigatório não foi preenchido corretamente</b>';
        echo '</div>';
    }

    if ( $this->session->flashdata('erro') != "" ) {
        echo '<div class="alert">';
            echo '<b>'.$this->session->flashdata('erro').'</b>';
        echo '</div>';
    }

    if ( $this->session->flashdata('sucesso') != "" ) {
        echo '<div class="alert" style="background-color:#0585e1" >';
            echo '<b>'.$this->session->flashdata('sucesso').'</b>';
        echo '</div>';
    }
?>
<div class="titulo-secao">Cadastrar</div>
<?php echo form_open_multipart('produtos/cadastrar', array('id' => 'form_produto') ) ?>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="nome">Nome do Produto</label>
                <input class="form-control" type="text" id="nome" name="nome" value="<?php echo $produto['nome']; ?>">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="registro">Reputação do produto</label>
                <div class="rating">
                    <input name="stars" id="e5" type="radio" value="5"></a><label for="e5">★</label>
                    <input name="stars" id="e4" type="radio" value="4"></a><label for="e4">★</label>
                    <input name="stars" id="e3" type="radio" value="3"></a><label for="e3">★</label>
                    <input name="stars" id="e2" type="radio" value="2"></a><label for="e2">★</label>
                    <input name="stars" id="e1" type="radio" value="1"></a><label for="e1">★</label>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label >Destaque Home</label>
            </div>
            <div class="col-8">
                 <div class="form-group">
                    <input type="checkbox" id="destaque_home" name="destaque_home"  value="1" class="myCheckbox" />
                    <label for="destaque_home"><span></span>Destacar</label>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="categoria">Categoria do Produto</label>
                <select class="form-control" id="categoria" name="categoria">
                    <option value="0" selected disabled>Selecione uma categoria</option>
                    <?php if($categorias) : foreach($categorias as $categoria) : ?>
                        <option value="<?php echo $categoria['codigo']; ?>"><?php echo $categoria['nome']; ?></option>
                    <?php endforeach; endif; ?>
                </select>
            </div>
            <div class="form-group">
                <div class="lista-categorias">
                    <div class="lista-categorias__categoria lista-categorias__categoria--clone">
                        <input class="form-control" type="text" readonly>
                        <input name="categoria[]" type="hidden">
                        <a href="#">
                            <img src="<?php echo site_url(); ?>/assets/images/ico-deletar.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label >Tags ideal para empresas:</label>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <input type="checkbox" id="empresa_pequena" name="empresas[]"  value="1" class="myCheckbox" />
                    <label for="empresa_pequena"><span></span>Pequenas</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <input type="checkbox" id="empresa_media" name="empresas[]"  value="2" class="myCheckbox" />
                    <label for="empresa_media"><span></span>Média</label>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <input type="checkbox" id="empresa_grandes" name="empresas[]"  value="3" class="myCheckbox" />
                    <label for="empresa_grandes"><span></span>Grandes</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="descricao_curta">Descrição Curta do Produto</label>
                <input class="form-control" type="text" id="descricao_curta" name="descricao_curta" value="<?php echo $produto['descricao_curta']; ?>">
            </div>
        </div>
    </div>

        <div class="col-12" style="margin-top: 20px;" >
            <div class="form-group">
                <label for="descricao">Adicionar conteúdo destaque</label>          
            </div>

            <div class="form-group">
                <div id="conteudo-container">
                    <!-- DESTAQUE 1 -->
                    <div id="1" style="display:none;" class="box-destaque">
                         <h1>1 º Destaque</h1>
                         <label>Titulo</label>
                         <input class="form-control" type="text" name="titulo-destaque-1">

                         <br>
                         <br>
                         <label class="col-12">Imagem Destaque</label>
                         <div class="col-12" style="display: flex;justify-content: center;">
                            <div class="uploads-imagens">
                                <div class="upload-imagem upload-imagem__virtual">
                                    <div class="upload-imagem__thumb"></div>
                                    
                                        <input class="form-control" type="file" id="imagem_conteudo_1" name="imagem_conteudo_1">
                                        <button class="btn btn--centro" type="button">Enviar imagem</button>
                                    
                                        <p>(JPG ou PNG)</p>
                                </div>
                            </div>
                        </div>

                         <label class="col-12">Conteúdo</label>
                         <textarea class="form-control" name="conteudo-destaque-1" rows='7'></textarea>

                        <row class="col-12">
                             
                            <label class="col-12" style="margin-top: 31px;">Tópicos</label>

                                <textarea class="form-control" id="topicos" name="topico-1"><ul><li></li></ul></textarea>
                         </row>
                        <!--  <div id="aviso-div-topico"></div> -->
                         <span style="display:none;" class="remove-conteudo" data-id="1" data-toggle="modal" data-target="#modal" onclick="removeConteudo(1)">X</span>

                    </div>
                    <div  class="add-conteudo add-conteudo-1" onclick="adicionarConteudo(1)">+</div>
                    
                    <!-- DESTAQUE 2 -->
                    <div id="2" style="display:none;" class="box-destaque">
                         <h1>2 º Destaque</h1>
                         <label>Titulo</label>
                         <input class="form-control" type="text" name="titulo-destaque-2">

                         <br>
                         <br>
                         <label class="col-12">Imagem Destaque</label>
                         <div class="col-12" style="display: flex;justify-content: center;">
                            <div class="uploads-imagens">
                                <div class="upload-imagem upload-imagem__virtual">
                                    <div class="upload-imagem__thumb"></div>
                                    <div class="form-group">
                                        <input class="form-control" type="file" id="imagem_conteudo_2" name="imagem_conteudo_2">
                                        <button class="btn btn--centro" type="button">Enviar imagem</button>
                                    </div>
                                    <p>(JPG ou PNG)</p>
                                </div>
                            </div>
                        </div>

                         <label class="col-12">Conteúdo</label>
                         <textarea class="form-control" name="conteudo-destaque-2" rows='7'></textarea>


                        <row class="col-12">
                             
                            <label class="col-12" style="margin-top: 31px;">Tópicos</label>

                            <textarea class="form-control" id="topicos-2" name="topico-2"> <ul><li></li></ul> </textarea>
                         
                        </row>
                        <span style="display:none;" class="remove-conteudo" data-id="1" data-toggle="modal" data-target="#modal" onclick="removeConteudo(2)">X</span>
                    </div>
                    <div style="display:none;" class="add-conteudo add-conteudo-2" onclick="adicionarConteudo(2)">+</div>

                    <!-- DESTAQUE 3 -->
                    <div id="3" style="display:none;" class="box-destaque">
                         <h1>3 º Destaque</h1>
                         <label>Titulo</label>
                         <input class="form-control" type="text" name="titulo-destaque-3">

                         <br>
                         <br>
                         <label class="col-12">Imagem Destaque</label>
                         <div class="col-12" style="display: flex;justify-content: center;">
                            <div class="uploads-imagens">
                                <div class="upload-imagem upload-imagem__virtual">
                                    <div class="upload-imagem__thumb"></div>
                                    <div class="form-group">
                                        <input class="form-control" type="file" id="imagem_conteudo_3" name="imagem_conteudo_3">
                                        <button class="btn btn--centro" type="button">Enviar imagem</button>
                                    </div>
                                    <p>(JPG ou PNG)</p>
                                </div>
                            </div>
                        </div>

                         <label class="col-12">Conteúdo</label>
                         <textarea class="form-control" name="conteudo-destaque-3" rows='7'></textarea>

                         <row class="col-12">
                             
                            <label class="col-12" style="margin-top: 31px;">Tópicos</label>

                            <textarea class="form-control" id="topicos-3" name="topico-3"> <ul><li></li></ul> </textarea>
 
                         </row>
                         <span style="display:none;" class="remove-conteudo" data-id="1" data-toggle="modal" data-target="#modal" onclick="removeConteudo(3)">X</span>
                    </div>

                    <div style="display:none;" class="add-conteudo add-conteudo-3" onclick="adicionarConteudo(3)">+</div>

                    <!-- DESTAQUE 4 -->
                    <div id="4" style="display:none;" class="box-destaque">
                         <h1>4 º Destaque</h1>
                         <label>Titulo</label>
                         <input class="form-control" type="text" name="titulo-destaque-4">

                         <br>
                         <br>
                         <label class="col-12">Imagem Destaque</label>
                         <div class="col-12" style="display: flex;justify-content: center;">
                            <div class="uploads-imagens">
                                <div class="upload-imagem upload-imagem__virtual">
                                    <div class="upload-imagem__thumb"></div>
                                    <div class="form-group">
                                        <input class="form-control" type="file" id="imagem_conteudo_4" name="imagem_conteudo_4">
                                        <button class="btn btn--centro" type="button">Enviar imagem</button>
                                    </div>
                                    <p>(JPG ou PNG)</p>
                                </div>
                            </div>
                        </div>

                         <label class="col-12">Conteúdo</label>
                         <textarea class="form-control" name="conteudo-destaque-4" rows='7'></textarea>

                         <row class="col-12">
                             
                            <label class="col-12" style="margin-top: 31px;">Tópicos</label>
                             <textarea class="form-control" id="topicos-4" name="topico-4"> <ul><li></li></ul> </textarea>
                         </row>
                         <span style="display:none;" class="remove-conteudo" data-id="1" data-toggle="modal" data-target="#modal" onclick="removeConteudo(4)">X</span>
                    </div>
                    <div style="display:none;" class="add-conteudo add-conteudo-4" onclick="adicionarConteudo(4)">+</div>

                    <!-- DESTAQUE 5 -->
                    <div id="5" style="display:none;" class="box-destaque">
                         <h1>5 º Destaque</h1>
                         <label>Titulo</label>
                         <input class="form-control" type="text" name="titulo-destaque-5">

                         <br>
                         <br>
                         <label class="col-12">Imagem Destaque</label>
                        <div class="col-12" style="display: flex;justify-content: center;">
                        <div class="uploads-imagens">
                            <div class="upload-imagem upload-imagem__virtual">
                                <div class="upload-imagem__thumb"></div>
                                <div class="form-group">
                                    <input class="form-control" type="file" id="imagem_conteudo_5" name="imagem_conteudo_5">
                                    <button class="btn btn--centro" type="button">Enviar imagem</button>
                                </div>
                                <p>(JPG ou PNG)</p>
                            </div>
                        </div>
                    </div>

                         <label class="col-12">Conteúdo</label>
                         <textarea class="form-control" name="conteudo-destaque-5" rows='7'></textarea>

                         <row class="col-12">
                             
                            <label class="col-12" style="margin-top: 31px;">Tópicos</label>

                            <textarea class="form-control" id="topicos-5" name="topico-5"> <ul><li></li></ul> </textarea>

                         </row>
                         <span style="display:none;" class="remove-conteudo" data-id="1" data-toggle="modal" data-target="#modal" onclick="removeConteudo(5)">X</span>
                    </div>
                    <div style="display:none;" class="add-conteudo add-conteudo-5" onclick="adicionarConteudo(5)">+</div>

                    <!-- DESTAQUE 6 -->
                    <div id="6" style="display:none;" class="box-destaque">
                         <h1>6 º Destaque</h1>
                         <label>Titulo</label>
                         <input class="form-control" type="text" name="titulo-destaque-6">

                         <br>
                         <br>
                         <label class="col-12">Imagem Destaque</label>
                         <div class="col-12" style="display: flex;justify-content: center;">
                            <div class="uploads-imagens">
                                <div class="upload-imagem upload-imagem__virtual">
                                    <div class="upload-imagem__thumb"></div>
                                    <div class="form-group">
                                        <input class="form-control" type="file" id="imagem_conteudo_6" name="imagem_conteudo_6">
                                        <button class="btn btn--centro" type="button">Enviar imagem</button>
                                    </div>
                                    <p>(JPG ou PNG)</p>
                                </div>
                            </div>
                        </div>

                         <label class="col-12">Conteúdo</label>
                         <textarea class="form-control" name="conteudo-destaque-6" rows='7'> </textarea>

                         <row class="col-12">
                             
                            <label class="col-12" style="margin-top: 31px;">Tópicos</label>

                            <textarea class="form-control" id="topicos-6" name="topico-6"> <ul><li></li></ul> </textarea>

                         </row>
                         <span style="display:none;" class="remove-conteudo" data-id="1" data-toggle="modal" data-target="#modal" onclick="removeConteudo(6)">X</span>
                    </div>
                    <div style="display:none;" class="add-conteudo add-conteudo-6" onclick="adicionarConteudo(6)">+</div>

                    <!-- DESTAQUE 7 -->
                    <div  id="7" style="display:none;" class="box-destaque">
                         <h1>7 º Destaque</h1>
                         <label>Titulo</label>
                         <input class="form-control" type="text" name="titulo-destaque-7">

                         <div class="col-12" style="display: flex;justify-content: center;">
                            <div class="uploads-imagens">
                                <div class="upload-imagem upload-imagem__virtual">
                                    <div class="upload-imagem__thumb"></div>
                                    <div class="form-group">
                                        <input class="form-control" type="file" id="imagem_conteudo_7" name="imagem_conteudo_7">
                                        <button class="btn btn--centro" type="button">Enviar imagem</button>
                                    </div>
                                    <p>(JPG ou PNG)</p>
                                </div>
                            </div>
                        </div>

                         <label>Conteúdo</label>
                         <textarea class="form-control" name="conteudo-destaque-7" rows='7'></textarea>

                         <row class="col-12">
                             
                            <label class="col-12" style="margin-top: 31px;">Tópicos</label>

                            <textarea class="form-control" id="topicos-7" name="topico-7"> <ul><li></li></ul> </textarea>

                         </row>
                         <span style="display:none;" class="remove-conteudo" data-id="1" data-toggle="modal" data-target="#modal" onclick="removeConteudo(7)">X</span>
                    </div>
                    <div style="display:none;" class="add-conteudo add-conteudo-7" onclick="adicionarConteudo(7)">+</div>


                </div>
            </div>
            
                <div id="alert-div"></div>
        </div>

    
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="descricao">Descrição do Produto</label>
                <textarea class="form-control" rows="5" id="descricao" name="descricao"><?php echo $produto['descricao']; ?></textarea>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="especificacoes">Especificações</label>
                <textarea class="form-control" rows="5" id="especificacoes" name="especificacoes"><?php echo $produto['especificacoes']; ?></textarea>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="titulo_pagina">Título da página</label>
                <input class="form-control" type="text" id="titulo_pagina" name="titulo_pagina" value="<?php echo $produto['title']; ?>">
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="descricao_pagina">Descrição da página</label>
                <input class="form-control" type="text" id="descricao_pagina" name="descricao_pagina" value="<?php echo $produto['description']; ?>">
            </div>
        </div>
        <!-- <div class="col-12">
            <div class="form-group">
                <label for="ficha_tecnica">Ficha Tecnica</label>
                <textarea class="form-control" rows="5" id="ficha_tecnica" name="ficha_tecnica"><?php //echo $produto['ficha_tecnica']; ?></textarea>
            </div>
        </div> -->

        <div class="col-7">
            <div class="tabela tabela--galeria">
                <div class="linha cabecalho">
                    <div class="coluna">Imagens da galeria</div>
                    <div class="coluna"></div>
                </div>
                <div class="linha linha--galeria">
                    <div class="coluna">
                        <div class="banner_galeria__thumb"></div>
                        <input type="file" class="banner_galeria" name="banner_galeria[]">
                        <button class="btn" type="button">Selecionar imagem</button>
                    </div>
                    <div class="coluna">
                        <a class="remover-banner_galeria" href="#">
                            <img src="<?php echo site_url('assets/images/ico-deletar.png'); ?>">
                        </a>
                    </div>
                </div>
            </div>
        </div>
         <div class="col-5">
            <div class="uploads-imagens">
                <div class="upload-imagem upload-imagem__virtual">
                    <div class="upload-imagem__thumb"></div>
                    <div class="form-group">
                        <input type="file" id="banner_vitrine" name="banner_vitrine">
                        <button class="btn btn--centro" type="button">Enviar imagem</button>
                    </div>
                    (JPG ou PNG)
                    <div class="form-group">
                        <label for="descricao_img">Descrição da imagem</label>
                        <input class="form-control" type="text" id="descricao_img" name="descricao_img">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <button id="btn-form_produto" class="btn btn--centro" type="submit">Finalizar</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tem certeza?</h5>
        
      </div>
      <div class="modal-body">
        <p>Todas as informações serão perdidas!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="botaoModalExcluir">Excluir</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close(); ?>