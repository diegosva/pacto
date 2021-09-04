/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     8/31/2021 10:37:02 PM                        */
/*==============================================================*/


drop table if exists ASISTENCIA;

drop table if exists ASOCIACION;

drop table if exists BODEGA;

drop table if exists CATEGORIAPRODUCTO;

drop table if exists CERTIFICADO;

drop table if exists DETALLEBODEGA;

drop table if exists DETALLEFACTURA;

drop table if exists DETALLEMANTENIMIENTO;

drop table if exists DIASASISTENCIA;

drop table if exists DIRECTIVA;

drop table if exists ENTIDAD;

drop table if exists ESTADOPEDIDO;

drop table if exists HOJADECAMPO;

drop table if exists MANTENIMIENTOMAQUINARIA;

drop table if exists MAQUINARIASOCIO;

drop table if exists MULTA;

drop table if exists PAIS;

drop table if exists PEDIDOS;

drop table if exists PERTENECEN;

drop table if exists PRODUCTO;

drop table if exists REUNION;

drop table if exists ROL;

drop table if exists STATUSREUNION;

drop table if exists SUBTOTALHOJADECAMPO;

drop table if exists TIPOMANTENIMIENTO;

drop table if exists TIPOREUNION;

drop table if exists UNIDADES;

drop table if exists USUARIO;

/*==============================================================*/
/* Table: ASISTENCIA                                            */
/*==============================================================*/
create table ASISTENCIA
(
   ASISTENCIAID         int not null auto_increment,
   USUARIOID            int not null,
   REUNIONID            int,
   CONFIRMACIONASIS     bool not null,
   primary key (ASISTENCIAID)
);

/*==============================================================*/
/* Table: ASOCIACION                                            */
/*==============================================================*/
create table ASOCIACION
(
   ASOCIACIONID         int not null auto_increment,
   NOMBREASO            varchar(20) not null,
   SECTORASO            varchar(20) not null,
   BARRIOASO            varchar(20) not null,
   PARROQUIAASO         varchar(20) not null,
   LOGOASO              char(100),
   STATUSASO            int not null,
   primary key (ASOCIACIONID)
);

/*==============================================================*/
/* Table: BODEGA                                                */
/*==============================================================*/
create table BODEGA
(
   BODEGAID             int not null auto_increment,
   PERTENECENID         int,
   FECHABODEGA          date not null,
   TOTALCOSTO           float,
   primary key (BODEGAID)
);

/*==============================================================*/
/* Table: CATEGORIAPRODUCTO                                     */
/*==============================================================*/
create table CATEGORIAPRODUCTO
(
   CATEGORIAID          int not null auto_increment,
   NOMCAT               varchar(20) not null,
   DESCCAT              varchar(40) not null,
   primary key (CATEGORIAID)
);

/*==============================================================*/
/* Table: CERTIFICADO                                           */
/*==============================================================*/
create table CERTIFICADO
(
   CERTIFICADOID        int not null auto_increment,
   DIASASISTENCIAID     int,
   APROBACION           int not null,
   CERTIFICADO          varchar(30) not null,
   primary key (CERTIFICADOID)
);

/*==============================================================*/
/* Table: DETALLEBODEGA                                         */
/*==============================================================*/
create table DETALLEBODEGA
(
   DETBODEGAID          int not null auto_increment,
   PRODUCTOID           int,
   UNIDADESID           int,
   BODEGAID             int,
   STOCKBODEGA          float not null,
   PRECIOBODEGA         float not null,
   DESCRIPBODEGA        varchar(200),
   primary key (DETBODEGAID)
);

/*==============================================================*/
/* Table: DETALLEFACTURA                                        */
/*==============================================================*/
create table DETALLEFACTURA
(
   DETALLEID            int not null auto_increment,
   PRODUCTOID           int not null,
   PEDIDOSID            int not null,
   CANTIDAD             int not null,
   TOTALPRODUCT         float not null,
   primary key (DETALLEID)
);

/*==============================================================*/
/* Table: DETALLEMANTENIMIENTO                                  */
/*==============================================================*/
create table DETALLEMANTENIMIENTO
(
   MANTENIMIENTOID      int,
   DETALLEMANTEID       int not null auto_increment,
   DESCRIPCIONMANTE     varchar(300),
   PRECIOMANTE          float not null,
   primary key (DETALLEMANTEID)
);

/*==============================================================*/
/* Table: DIASASISTENCIA                                        */
/*==============================================================*/
create table DIASASISTENCIA
(
   DIASASISTENCIAID     int not null auto_increment,
   ASISTENCIAID         int,
   DIASASISTENCIA       varchar(20) not null,
   primary key (DIASASISTENCIAID)
);

/*==============================================================*/
/* Table: DIRECTIVA                                             */
/*==============================================================*/
create table DIRECTIVA
(
   DIRECTIVAID          int not null auto_increment,
   CARGODIR             varchar(20) not null,
   PERIODODIR           varchar(20) not null,
   primary key (DIRECTIVAID)
);

/*==============================================================*/
/* Table: ENTIDAD                                               */
/*==============================================================*/
create table ENTIDAD
(
   ENTIDADID            int not null auto_increment,
   PAISID               int,
   NOMBREENT            varchar(20) not null,
   DIRENT               varchar(40) not null,
   TELENT               varchar(12) not null,
   CIUENT               varchar(20) not null,
   TIPO                 varchar(20) not null,
   primary key (ENTIDADID)
);

/*==============================================================*/
/* Table: ESTADOPEDIDO                                          */
/*==============================================================*/
create table ESTADOPEDIDO
(
   ESTADOPEDIDOID       int not null auto_increment,
   NOMBREESPE           varchar(20) not null,
   primary key (ESTADOPEDIDOID)
);

/*==============================================================*/
/* Table: HOJADECAMPO                                           */
/*==============================================================*/
create table HOJADECAMPO
(
   HOJADECAMPOID        int not null auto_increment,
   SUBHOJADECAMPOID     int,
   PREPASUELO           bool,
   PREPASEMILLA         bool,
   SIEMBRA              bool,
   RESIEMBRA            bool,
   DESHIERBE            bool,
   APOQUE               bool,
   LIMPIDESOJE          bool,
   ELAABONOSO           bool,
   ELAABONOLI           bool,
   APLIABONO            bool,
   CONTROLPLAGA         bool,
   CONTROLENFER         bool,
   MANTEFINCA           bool,
   COSECHA              bool,
   ACARREOTRANS         bool,
   DESCARGA             bool,
   CALIMANTEEQUIPO      bool,
   MOLIENDA             bool,
   FILTRADO             bool,
   MELADA               bool,
   CLARIFICADO          bool,
   PUNTERO              bool,
   BATIDO               bool,
   TAMIZADO             bool,
   EMPACADO             bool,
   CODIFICADO           bool,
   LIMPIEZAMOD          bool,
   DESINFECCIONMOD      bool,
   REGISTROVEN          bool,
   LLENADOCONTA         bool,
   CAPACITACION         bool,
   COMERCIALIZACION     bool,
   FECHADG              date not null,
   NUMTRADG             int,
   primary key (HOJADECAMPOID)
);

/*==============================================================*/
/* Table: MANTENIMIENTOMAQUINARIA                               */
/*==============================================================*/
create table MANTENIMIENTOMAQUINARIA
(
   MANTENIMIENTOID      int not null auto_increment,
   TIPOMANID            int,
   MAQUINARIAID         int,
   FECHAMAN             datetime not null,
   DESCMAN              varchar(100) not null,
   COSTOMAN             float not null,
   PROXIMOMAN           datetime not null,
   primary key (MANTENIMIENTOID)
);

/*==============================================================*/
/* Table: MAQUINARIASOCIO                                       */
/*==============================================================*/
create table MAQUINARIASOCIO
(
   MAQUINARIAID         int not null auto_increment,
   PERTENECENID         int,
   ENTIDADID            int,
   NOMBREMAQ            varchar(20) not null,
   ESTADOMAQ            varchar(120) not null,
   MARCAMAQ             varchar(20) not null,
   KILOMETRAJEMAQ       int,
   PLACAMAQ             varchar(10),
   ORIGENMAQ            varchar(20) not null,
   CAPACIDADMAQ         varchar(20),
   primary key (MAQUINARIAID)
);

/*==============================================================*/
/* Table: MULTA                                                 */
/*==============================================================*/
create table MULTA
(
   MULTAID              int not null auto_increment,
   ASISTENCIAID         int,
   NOMMUL               varchar(20) not null,
   DESCMUL              varchar(50) not null,
   VALORMUL             float not null,
   primary key (MULTAID)
);

/*==============================================================*/
/* Table: PAIS                                                  */
/*==============================================================*/
create table PAIS
(
   PAISID               int not null auto_increment,
   NOMPAIS              varchar(20) not null,
   primary key (PAISID)
);

/*==============================================================*/
/* Table: PEDIDOS                                               */
/*==============================================================*/
create table PEDIDOS
(
   PEDIDOSID            int not null auto_increment,
   USUARIOID            int,
   ESTADOPEDIDOID       int,
   FECHAPEDIDO          date not null,
   TOTALPEDIDO          float,
   STATUSPEDIDO         bool not null,
   primary key (PEDIDOSID)
);

/*==============================================================*/
/* Table: PERTENECEN                                            */
/*==============================================================*/
create table PERTENECEN
(
   PERTENECENID         int not null auto_increment,
   USUARIOID            int not null,
   ASOCIACIONID         int not null,
   DIRECTIVAID          int,
   primary key (PERTENECENID)
);

/*==============================================================*/
/* Table: PRODUCTO                                              */
/*==============================================================*/
create table PRODUCTO
(
   PRODUCTOID           int not null auto_increment,
   CATEGORIAID          int,
   ASOCIACIONID         int,
   UNIDADESID           int,
   NOMPRODUCT           varchar(20) not null,
   DESCRIPCIONPRODUCT   varchar(20) not null,
   PRECIOPRODUCT        float not null,
   STOCKPRODUCT         int not null,
   PVPPRODUCT           float not null,
   STATUSPRODUCT        int not null,
   primary key (PRODUCTOID)
);

/*==============================================================*/
/* Table: REUNION                                               */
/*==============================================================*/
create table REUNION
(
   REUNIONID            int not null auto_increment,
   TIPOREUNIONID        int,
   ENTIDADID            int,
   STATUSREUID          int,
   FECHAINIREU          datetime not null,
   HORAREU              time not null,
   TEMAREU              varchar(20) not null,
   FECHAFINREU          datetime,
   HORAFINREU           time,
   TIPOREU              varchar(20) not null,
   ACTA                 varchar(40),
   HORAS                int,
   CAPACITADOR          varchar(20),
   primary key (REUNIONID)
);

/*==============================================================*/
/* Table: ROL                                                   */
/*==============================================================*/
create table ROL
(
   ROLID                int not null auto_increment,
   ROLNOM               varchar(20) not null,
   primary key (ROLID)
);

/*==============================================================*/
/* Table: STATUSREUNION                                         */
/*==============================================================*/
create table STATUSREUNION
(
   STATUSREUID          int not null auto_increment,
   ESTADOREU            varchar(20) not null,
   primary key (STATUSREUID)
);

/*==============================================================*/
/* Table: SUBTOTALHOJADECAMPO                                   */
/*==============================================================*/
create table SUBTOTALHOJADECAMPO
(
   SUBHOJADECAMPOID     int not null auto_increment,
   PERTENECENID         int,
   SUBJORNAL            float,
   COSJORNAL            float,
   COSMANO              float,
   COSFAMI              float,
   COSLENA              float,
   COSTRANS             float,
   COSMANT              float,
   COSCANA              float,
   COSTRAPICHE          float,
   COSTINA              float,
   COSINFRA             float,
   OBSERVACIONES        varchar(300),
   HOJASTATUS           float,
   NUMSEMANA            float,
   primary key (SUBHOJADECAMPOID)
);

/*==============================================================*/
/* Table: TIPOMANTENIMIENTO                                     */
/*==============================================================*/
create table TIPOMANTENIMIENTO
(
   TIPOMANID            int not null auto_increment,
   NOMBRETIP            varchar(20) not null,
   primary key (TIPOMANID)
);

/*==============================================================*/
/* Table: TIPOREUNION                                           */
/*==============================================================*/
create table TIPOREUNION
(
   TIPOREUNIONID        int not null auto_increment,
   TIPOREUNION          varchar(20) not null,
   primary key (TIPOREUNIONID)
);

/*==============================================================*/
/* Table: UNIDADES                                              */
/*==============================================================*/
create table UNIDADES
(
   UNIDADESID           int not null auto_increment,
   NOMUNIDADES          varchar(20) not null,
   primary key (UNIDADESID)
);

/*==============================================================*/
/* Table: USUARIO                                               */
/*==============================================================*/
create table USUARIO
(
   USUARIOID            int not null auto_increment,
   ROLID                int,
   NOMBREUSU            varchar(20) not null,
   EMAILUSU             varchar(30) not null,
   TELCUSU              varchar(10) not null,
   TELCELUSU            varchar(10) not null,
   CONTRAUSU            varchar(60) not null,
   DIRUSU               varchar(30) not null,
   NOMBREAPEUSU         varchar(40) not null,
   HECTAREASUSU         float,
   CEDULAUSU            varchar(10) not null,
   STATUSUSU            int not null,
   primary key (USUARIOID)
);

alter table ASISTENCIA add constraint FK_ASISTE foreign key (USUARIOID)
      references USUARIO (USUARIOID) on delete restrict on update restrict;

alter table ASISTENCIA add constraint FK_TIENE foreign key (REUNIONID)
      references REUNION (REUNIONID) on delete restrict on update restrict;

alter table BODEGA add constraint FK_REFERENCE_34 foreign key (PERTENECENID)
      references PERTENECEN (PERTENECENID) on delete restrict on update restrict;

alter table CERTIFICADO add constraint FK_REFERENCE_25 foreign key (DIASASISTENCIAID)
      references DIASASISTENCIA (DIASASISTENCIAID) on delete restrict on update restrict;

alter table DETALLEBODEGA add constraint FK_DETALLABODEGA foreign key (BODEGAID)
      references BODEGA (BODEGAID) on delete restrict on update restrict;

alter table DETALLEBODEGA add constraint FK_REFERENCE_35 foreign key (PRODUCTOID)
      references PRODUCTO (PRODUCTOID) on delete restrict on update restrict;

alter table DETALLEBODEGA add constraint FK_REFERENCE_36 foreign key (UNIDADESID)
      references UNIDADES (UNIDADESID) on delete restrict on update restrict;

alter table DETALLEFACTURA add constraint FK_CONTENER foreign key (PRODUCTOID)
      references PRODUCTO (PRODUCTOID) on delete restrict on update restrict;

alter table DETALLEFACTURA add constraint FK_REFERENCE_29 foreign key (PEDIDOSID)
      references PEDIDOS (PEDIDOSID) on delete restrict on update restrict;

alter table DETALLEMANTENIMIENTO add constraint FK_REFERENCE_30 foreign key (MANTENIMIENTOID)
      references MANTENIMIENTOMAQUINARIA (MANTENIMIENTOID) on delete restrict on update restrict;

alter table DIASASISTENCIA add constraint FK_REFERENCE_24 foreign key (ASISTENCIAID)
      references ASISTENCIA (ASISTENCIAID) on delete restrict on update restrict;

alter table ENTIDAD add constraint FK_SE_UBICA foreign key (PAISID)
      references PAIS (PAISID) on delete restrict on update restrict;

alter table HOJADECAMPO add constraint FK_REFERENCE_26 foreign key (SUBHOJADECAMPOID)
      references SUBTOTALHOJADECAMPO (SUBHOJADECAMPOID) on delete restrict on update restrict;

alter table MANTENIMIENTOMAQUINARIA add constraint FK_ES foreign key (TIPOMANID)
      references TIPOMANTENIMIENTO (TIPOMANID) on delete restrict on update restrict;

alter table MANTENIMIENTOMAQUINARIA add constraint FK_TENER foreign key (MAQUINARIAID)
      references MAQUINARIASOCIO (MAQUINARIAID) on delete restrict on update restrict;

alter table MAQUINARIASOCIO add constraint FK_POSEE foreign key (PERTENECENID)
      references PERTENECEN (PERTENECENID) on delete restrict on update restrict;

alter table MAQUINARIASOCIO add constraint FK_REFERENCE_32 foreign key (ENTIDADID)
      references ENTIDAD (ENTIDADID) on delete restrict on update restrict;

alter table MULTA add constraint FK_PUEDE_MULTAR foreign key (ASISTENCIAID)
      references ASISTENCIA (ASISTENCIAID) on delete restrict on update restrict;

alter table PEDIDOS add constraint FK_REFERENCE_28 foreign key (USUARIOID)
      references USUARIO (USUARIOID) on delete restrict on update restrict;

alter table PEDIDOS add constraint FK_REFERENCE_31 foreign key (ESTADOPEDIDOID)
      references ESTADOPEDIDO (ESTADOPEDIDOID) on delete restrict on update restrict;

alter table PERTENECEN add constraint FK_FORMA_PARTE foreign key (DIRECTIVAID)
      references DIRECTIVA (DIRECTIVAID) on delete restrict on update restrict;

alter table PERTENECEN add constraint FK_PERTENECEN foreign key (USUARIOID)
      references USUARIO (USUARIOID) on delete restrict on update restrict;

alter table PERTENECEN add constraint FK_PERTENECEN2 foreign key (ASOCIACIONID)
      references ASOCIACION (ASOCIACIONID) on delete restrict on update restrict;

alter table PRODUCTO add constraint FK_PUEDE_TENER foreign key (CATEGORIAID)
      references CATEGORIAPRODUCTO (CATEGORIAID) on delete restrict on update restrict;

alter table PRODUCTO add constraint FK_REFERENCE_33 foreign key (ASOCIACIONID)
      references ASOCIACION (ASOCIACIONID) on delete restrict on update restrict;

alter table PRODUCTO add constraint FK_REFERENCE_37 foreign key (UNIDADESID)
      references UNIDADES (UNIDADESID) on delete restrict on update restrict;

alter table REUNION add constraint FK_ESTA foreign key (STATUSREUID)
      references STATUSREUNION (STATUSREUID) on delete restrict on update restrict;

alter table REUNION add constraint FK_PUEDE_DAR foreign key (ENTIDADID)
      references ENTIDAD (ENTIDADID) on delete restrict on update restrict;

alter table REUNION add constraint FK_PUEDE_SER foreign key (TIPOREUNIONID)
      references TIPOREUNION (TIPOREUNIONID) on delete restrict on update restrict;

alter table SUBTOTALHOJADECAMPO add constraint FK_REFERENCE_27 foreign key (PERTENECENID)
      references PERTENECEN (PERTENECENID) on delete restrict on update restrict;

alter table USUARIO add constraint FK_PERTENECE foreign key (ROLID)
      references ROL (ROLID) on delete restrict on update restrict;

