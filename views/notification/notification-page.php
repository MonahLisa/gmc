<?php
$id = $_GET['id'];
$notification = \app\models\Notification::findOne(['id'=>$id]);
$notification_type = \app\models\NotificationType::findOne(['id' => $notification->type_id]);
$notification_method = \app\models\NotificationMethod::findOne(['id' => $notification->method_of_determining_supplier_id]);
$source_funding = \app\models\NotificationSourceFunding::findOne(['id'=>$notification->source_funding_id]);
$this->title = 'Извещение "'.$notification->title.'" №'.$notification->id;
?>



<div class="table-responsive-sm" id="exportContent">
    <h4 style="text-align: center">ФЕДЕРАЛЬНОЕ ГОСУДАРСТВЕННОЕ УНИТАРНОЕ ПРЕДПРИЯТИЕ ГЛАВНЫЙ МЕЖРЕГИОНАЛЬНЫЙ ЦЕНТР ОБРАБОТКИ И РАСПРОСТРАНЕНИЯ СТАТИСТИЧЕСКОЙ ИНФОРМАЦИИ ФЕДЕРАЛЬНОЙ СЛУЖБЫ ГОСУДАРСТВЕННОЙ СТАТИСТИКИ

        (ГМЦ РОССТАТА)

    </h4>
    <h4 style="text-align: center">
        <?php echo $notification_type->title; ?>

        <?php echo $notification->title; ?>

        (указывается предмет закупки)</h4>
    <table class="table">
        <table class="table table-striped">
            <!--Table head-->
            <!--                <thead>-->
            <!--                <tr>-->
            <!---->
            <!--                    <th>Общая информация</th>-->
            <!--                    <th></th>-->
            <!---->
            <!--                </tr>-->
            <!--                </thead>-->
            <!--Table head-->
            <!--Table body-->
            <tbody>
            <tr>

                <td><b>Общая информация</b></td>
                <td></td>

            </tr>
            <tr>

                <td>Наименование закупки</td>
                <td><?php echo $notification->title; ?></td>

            </tr>
            <tr>

                <td>Способ проведения закупки</td>
                <td><?php echo $notification_method->title; ?></td>

            </tr>



<!--            При необходимости не отображаются-->
            <tr>

                <td>Наименование электронной площадки в информационно-телекоммуникационной сети «Интернет»</td>
                <td><?php echo $notification->electronic_platform_name; ?></td>

            </tr>
            <!--            При необходимости не отображаются-->
            <tr>

                <td>Адрес электронной площадки в информационно-телекоммуникационной сети «Интернет»</td>
                <td><?php echo $notification->platform_link; ?></td>

            </tr>




            <tr>

                <td>Совместная закупка</td>
                <?php if($notification->joint_procurement === 0){ ?>
                <td>Нет</td>
                <?php }else{ ?>
                    <td>Да</td>
                <?php } ?>
            </tr>



            <tr>
                <td>Размещается вследствие ЧС</td>
                <?php if($notification->placed_due_emergency === 0){ ?>
                    <td>Нет</td>
                <?php }else{ ?>
                    <td>Да</td>
                <?php } ?>
            </tr>



            <tr>

                <td><b>Сведения об организаторе</b></td>
                <td></td>

            </tr>
            <tr>

                <td>Размещение осуществляет</td>
                <td><?php echo $notification->carries_out_placement; ?></td>

            </tr>
            <tr>

                <td>Наименование Заказчика</td>
                <td><?php echo $notification->customer_name; ?></td>

            </tr>
            <tr>

                <td>ИНН</td>
                <td><?php echo $notification->TIN; ?></td>

            </tr>
            <tr>

                <td>КПП</td>
                <td><?php echo $notification->CRS; ?></td>

            </tr>
            <tr>

                <td>ОГРН</td>
                <td><?php echo $notification->MSRN; ?></td>

            </tr>
            <tr>
                <td>Место нахождения (юридический адрес)</td>
                <td><?php echo $notification->location; ?></td>
            </tr>
            <tr>
                <td>Почтовый адрес (фактический адрес)</td>
                <td><?php echo $notification->postal_address; ?></td>
            </tr>

            <tr>
                <td>Контактная информация</td>
                <td><?php echo $notification->contact_info; ?></td>
            </tr>





            <tr>

                <td><b>Требования к участникам закупки</b></td>
                <td><?php echo $notification->requirements; ?></td>

            </tr>
            <tr>

                <td>Требование к отсутствию участников закупки в Реестре недобросовестных поставщиков</td>
                <?php if($notification->unscrupulous_supplier === 0){ ?>
                    <td>Не установлено</td>
                <?php }else{ ?>
                    <td>Установлено</td>
                <?php } ?>

            </tr>
            <tr>

                <td>Преимущества</td>
                <td><?php echo $notification->advantages_id; ?></td>

            </tr>
            <tr>

                <td>Ограничение участия в определении поставщика (подрядчика, исполнителя)</td>
                <td><?php echo $notification->limitation_id; ?></td>

            </tr>
            <tr>

                <td>Условия, приоритеты, запреты и ограничения допуска товаров, происходящих из иностранного государства или группы иностранных государств, работ, услуг, соответственно выполняемых, оказываемых иностранными лицами</td>
                <td><?php echo $notification->conditions_for_admission_goods; ?></td>

            </tr>
            <tr>

                <td>Привлечение к исполнению договора субподрядрядчиков (соисполнителей) из числа субъектов малого и среднего предпринимательства</td>
                <?php if($notification->involvement === 0){ ?>
                    <td>Не установлено</td>
                <?php }else{ ?>
                    <td>Установлено</td>
                <?php } ?>

            </tr>
            <tr>
                <td>Требования к содержанию, составу котировочной заявки и инструкция по ее заполнению. Условия подачи котировочных заявок</td>
                <td><?php echo $notification->requirements_for_content; ?></td>
            </tr>
            <tr>
                <td><b>Информация о порядке проведения процедуры закупки</b></td>
                <td></td>
            </tr>

            <tr>
                <td>Дата размещения извещения на электронной площадке</td>
                <td><?php echo $notification->date_notification_placement; ?></td>
            </tr>

            <tr>
                <td>Дата начала срока подачи заявок</td>
                <td><?php echo $notification->start_date_application_deadline; ?></td>
            </tr>

            <tr>
                <td>Дата и время окончания срока подачи заявок (по московскому времени)</td>
                <td><?php echo $notification->datetime_deadline_applications; ?></td>
            </tr>

            <tr>
                <td>Порядок подачи котировочных заявок</td>
                <td><?php echo $notification->procedure_submitting; ?></td>
            </tr>

            <tr>
                <td>Дата рассмотрения и оценки (ранжирования) заявок</td>
                <td><?php echo $notification->review_date; ?></td>
            </tr>

            <tr>
                <td>Порядок рассмотрения котировочных заявок и подведения итогов закупочной процедуры</td>
                <td><?php echo $notification->procedure_consideration; ?></td>
            </tr>

            <tr>
                <td>Дата окончания подачи запросов на разъяснение извещения по закупке</td>
                <td><?php echo $notification->end_date_submitting_requests; ?></td>
            </tr>

            <tr>
                <td><b>Сведения о договоре</b></td>
                <td></td>
            </tr>

            <tr>
                <td>Предмет договора</td>
                <td><?php echo $notification->subject_contract; ?></td>
            </tr>

            <tr>
                <td>Начальная (максимальная) цена договора</td>
                <td><b><?php echo $notification->initial_contract_price; ?> Российский рубль</b><br>

                    Указанная цена не может быть превышена при заключении Договора по итогам проведения запроса котировок.<br>

                    Цена формируется на основе коммерческих предложений и прайсов.</td>
            </tr>

            <tr>
                <td>Источник финансирования</td>
                <td><?php echo $source_funding->title; ?></td>
            </tr>


            <tr>
                <td>Сведения о включенных (не включенных) в цену товара, выполнения работ, оказания услуг расходах</td>
                <td><?php echo $notification->expenses_info; ?></td>
            </tr>

            <tr>
                <td>Срок и условия оплаты</td>
                <td><?php echo $notification->payment_term; ?></td>
            </tr>


            <tr>
                <td>Место поставки товара, выполнения работ, оказания услуг</td>
                <td><?php echo $notification->delivery_place; ?></td>
            </tr>

            <tr>
                <td>Срок поставки товара, выполнения работ, оказания услуг</td>
                <td>Поставка товара осуществляется в течение <?php echo $notification->delivery_time; ?> рабочих дней с даты заключения Договора.</td>
            </tr>

            <tr>
                <td>Срок действия договора</td>
                <td>Договор вступает в силу с даты его заключения и действует по <?php echo $notification->term_contract; ?> при условии полного исполнения Сторонами своих обязательств.</td>
            </tr>

            <tr>
                <td><b>Объект закупки (лот)</b></td>
                <td></td>
            </tr>

            <tr>
                <td></td>
                <td style="text-align: right">Российский рубль</td>
            </tr>

            </tbody>
            <!--Table body-->
        </table>
    </table>

    <!--        <div class="row">-->
    <!--            <div class="col-4">-->
    <!--                <div id="list-example" class="list-group">-->
    <!--                    <a class="list-group-item list-group-item-action" href="#list-item-1">Поставка насоса ЦВК 4/112</a>-->
    <!--                    <a class="list-group-item list-group-item-action" href="#list-item-2">Поставка насоса ЦВК 4/112</a>-->
    <!---->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-8">-->
    <!--                <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">-->
    <!--                    <h4 id="list-item-1">Наименование товара, работ, услуг: Поставка насоса ЦВК 4/112</h4>-->
    <!--                    <p>Код по ОКВЭД2: 28.13</p>-->
    <!--                    <p>Код по ОКПД2: 28.13.14.110</p>-->
    <!--                    <p>Единица измерения: шт</p>-->
    <!--                    <p>Количество: 1</p>-->
    <!--                    <p>Цена за ед.изм.: 145 676,67</p>-->
    <!--                    <p>Стоимость: 145 676,67</p>-->
    <!---->
    <!--                    <h4 id="list-item-1">Наименование товара, работ, услуг: Поставка насоса ЦВК 4/112</h4>-->
    <!--                    <p>Код по ОКВЭД2: 28.13</p>-->
    <!--                    <p>Код по ОКПД2: 28.13.14.110</p>-->
    <!--                    <p>Единица измерения: шт</p>-->
    <!--                    <p>Количество: 1</p>-->
    <!--                    <p>Цена за ед.изм.: 145 676,67</p>-->
    <!--                    <p>Стоимость: 145 676,67</p>-->
    <!---->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->







    <table class="table">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td>Наименование товара, работ, услуг</td>
                <td>Код по ОКВЭД2</td>
                <td>Код по ОКПД2</td>
                <td>Единица измерения</td>
                <td>Количество</td>
                <td>Цена за ед.изм.</td>
                <td>Стоимость</td>
            </tr>
            <tr>
                <td>Поставка насоса ЦВК 4/112</td>
                <td>28.13</td>
                <td>28.13.14.110</td>
                <td>шт</td>
                <td>1</td>
                <td>145 676,67</td>
                <td>145 676,67</td>
            </tr>
            </tbody>
        </table>
    </table>


    <table class="table">
        <table class="table table-striped">
            <tbody>
            <tr>
                <td><b>Возможность отмены закупки Заказчиком</b></td>
                <td><?php echo $notification->cancellation_purchase; ?></td>
            </tr>

            <tr>
                <td><b>Обеспечение заявок</b></td>
                <td></td>
            </tr>


            <tr>
                <td>Требование к обеспечению заявки</td>
                <?php if($notification->requirement_secure_app === 0){ ?>
                    <td>Не установлено</td>
                <?php }else{ ?>
                    <td>Установлено</td>
                <?php } ?>
            </tr>



            <tr>
                <td><b>Обеспечение исполнения договора</b></td>
                <td></td>
            </tr>

            <tr>
                <td>Требование к обеспечению исполнения договора</td>
                <?php if($notification->requirement_execution_contract === 0){ ?>
                    <td>Не установлено</td>
                <?php }else{ ?>
                    <td>Установлено</td>
                <?php } ?>
            </tr>


            <tr>
                <td><b>Предоставление документов по закупочной процедуре</b></td>
                <td></td>
            </tr>


            <tr>
                <td>Срок предоставления</td>
                <td>С <?php echo $notification->deadline_sub_doc_start; ?> по <?php echo $notification->deadline_sub_doc_finish; ?></td>
            </tr>

            <tr>
                <td>Место предоставления</td>
                <td><?php echo $notification->provision_place; ?></td>
            </tr>

            <tr>
                <td>Порядок предоставления</td>
                <td><?php echo $notification->procedure_for_providing; ?></td>
            </tr>

            <tr>
                <td><b>Перечень прикрепленных документов:</b></td>
                <td><?php echo $notification->doc_list; ?></td>
            </tr>



            </tbody>
        </table>
    </table>




</div>
<button onclick="Export2Doc('exportContent', 'test');">Скачать извещение в формате .doc</button>


<script>
    function Export2Doc(element, filename = ''){
        var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
        var postHtml = "</body></html>";
        var html = preHtml+document.getElementById(element).innerHTML+postHtml;

        var blob = new Blob(['\ufeff', html],{
            type: 'application/msword'
        });

        var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html)

        filename = filename?filename+'.doc': 'document.doc';

        var downloadLink = document.createElement("a");

        document.body.appendChild(downloadLink);

        if(navigator.msSaveOrOpenBlob){
            navigator.msSaveOrOpenBlob(blob, filename);
        }else{
            downloadLink.href = url;

            downloadLink.download = filename;

            downloadLink.click();
        }

        document.body.removeChild(downloadLink);


    }

</script>
